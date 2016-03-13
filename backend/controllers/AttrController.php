<?php

namespace backend\controllers;

use Yii;
use backend\models\Attrs;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AttrController implements the CRUD actions for Attrs model.
 */
class AttrController extends BaseController
{
    public function init()
    {
        parent::init();
        $this->checkRBAC("attrModule");
    }
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
     * Lists all Attrs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Attrs::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Attrs model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Yii::info( Yii::t('app/log', "Check Attr(attr id:{id})", ['id' =>$id]), 'operations');
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Attrs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Attrs();

        $create_flag=false;

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at=$model->created_at=time();

            $create_flag= $model->save();
        }
        if($create_flag)
        {
            Yii::info( Yii::t('app/log', "Create new Attr:{attrName})", ['attrName' =>$model->name]), 'operations');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                    'model' => $model,
                ]);
        }
    }

    /**
     * Updates an existing Attrs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $updated=false;
        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = time();
            $updated = $model->save();
        }
        if($updated)
        {
            Yii::info( Yii::t('app/log', "Update attr(attr name:{attrName})", ['attrName' =>$model->name]), 'operations');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Attrs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        Yii::info( Yii::t('app/log', "Delete attr(attr name:{attrName})", ['attrName' =>$model->name]), 'operations');
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Attrs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Attrs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Attrs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
