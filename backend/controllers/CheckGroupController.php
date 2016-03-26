<?php

namespace backend\controllers;

use Yii;
use backend\models\CheckGroup;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CheckGroupController implements the CRUD actions for CheckGroup model.
 */
class CheckGroupController extends Controller
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
     * Lists all CheckGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CheckGroup::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CheckGroup model.
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
     * Creates a new CheckGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CheckGroup();
        $createFlag=false;

        if ($model->load(Yii::$app->request->post())) {
            $model->step_count=0;
            $model->created_at=$model->updated_at=time();
            $createFlag=$model->save();
        }
        if($createFlag){
            Yii::info( Yii::t('app/log', "Create Check Group(Group:{GroupName})", ['GroupName' =>$model->title]), 'operations');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CheckGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $updateFlag=false;

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = time();
            $updateFlag=$model->save();
        }
        if($updateFlag) {
            Yii::info( Yii::t('app/log', "Update Check Group(Group:{GroupName},id:({id}))", ['GroupName' =>$model->title,'id'=>$model->id]), 'operations');
            return $this->redirect(['view', 'id' => $model->id]);
        }else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CheckGroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        Yii::info( Yii::t('app/log', "Delete Check Group(Group:{GroupName})", ['GroupName' =>$model->title]), 'operations');
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CheckGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return CheckGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CheckGroup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
