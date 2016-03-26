<?php

namespace backend\controllers;

use backend\models\CheckGroup;
use backend\models\forms\UsersForCheck;
use Yii;
use backend\models\CheckStep;
use backend\models\CheckStepUser;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CheckStepController implements the CRUD actions for CheckStep model.
 */
class CheckStepController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all CheckStep models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CheckStep::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CheckStep model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CheckStep model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($gid=0)
    {
        $model = new CheckStep();
        $users4Check=new UsersForCheck();
        $checkGroup=CheckGroup::findOne(['id'=>$gid]);
        $existSteps=CheckStep::getAssignSteps($gid);
        if($checkGroup===null)
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $saveFlag=false;

        if ($model->load(Yii::$app->request->post()) && $users4Check->load(Yii::$app->request->post())) {
            $max_step=CheckGroup::getGroupMaxStep($gid);
            if($max_step>=0)
            {
                $max_step++;
            }
            $model->step=$max_step;
            $model->created_at=time();
            $saveFlag = $model->save();
            if($saveFlag)
            {
                CheckGroup::updateStepCount($gid);
                $saveFlag=CheckStepUser::createSteps($model,$users4Check);
            }
        }
        if($saveFlag){
            Yii::info( Yii::t('app/log', "Create Check step", []), 'operations');
            return $this->redirect(['check-step/create', 'gid' => $gid]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'checkGroup'=>$checkGroup,
                'users4Check'=>$users4Check,
                'existSteps'=>$existSteps,
            ]);
        }
    }

    /**
     * Updates an existing CheckStep model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CheckStep model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CheckStep model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return CheckStep the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CheckStep::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
