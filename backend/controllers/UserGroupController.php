<?php

namespace backend\controllers;

use Yii;
use backend\models\UserGroup;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\libtool\ZTreeDataTransfer;

/**
 * UserGroupController implements the CRUD actions for UserGroup model.
 */
class UserGroupController extends BaseController
{
    public function init()
    {
        parent::init();
        $this->checkRBAC("userGroupManage");
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
     * Lists all UserGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UserGroup::find(),
        ]);


        $allGroup=UserGroup::getAllGroupData();
        $allGroupJson=ZTreeDataTransfer::array2simpleJson($allGroup);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'allGroup'=>$allGroupJson,
        ]);
    }

    /**
     * Displays a single UserGroup model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id,$message='')
    {
        $allGroup=UserGroup::getAllGroupData();
        $allGroupJson=ZTreeDataTransfer::array2simpleJson($allGroup,array('id','pid','name'),$id);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'allGroup'=>$allGroupJson,
            'message'=>$message,
        ]);
    }

    /**
     * Creates a new UserGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid=0)
    {
        $model = new UserGroup();
        $pModel=null;
        if($pid>0)
        {
            try{
                $pModel=$this->findModel($pid);
                if($pModel)
                {
                    $model->pid=$pModel->id;
                }
            }
            catch(\Exception $e)
            {

            }

        }
        $save_flag=false;

        if ($model->load(Yii::$app->request->post())) {
            $model=UserGroup::generateDefaultValue($model);
            if($model->save())
            {
                $save_flag=true;
            }
        }

        if($save_flag)
        {
            Yii::info( Yii::t('app/log', "Create userGroup(userGroup name:{userGroupName})", ['userGroupName' =>$model->name]), 'operations');
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else
        {
            if(!$pModel)
                $model->pid=0;
            return $this->render('create', [
                'model' => $model,
                'pModel'=>$pModel,
            ]);
        }
    }

    /**
     * Updates an existing UserGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $allGroup=UserGroup::getAllGroupData();
        $allGroupJson=ZTreeDataTransfer::array2simpleJson($allGroup);

        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            Yii::info( Yii::t('app/log', "Update userGroup(userGroup name:{userGroupName})", ['userGroupName' =>$model->name]), 'operations');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'allGroup'=>$allGroupJson,
            ]);
        }
    }

    /**
     * Deletes an existing UserGroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(!UserGroup::haveSon($id))
        {
            $model=$this->findModel($id);
            Yii::info( Yii::t('app/log', "Delete userGroup(userGroup name:{userGroupName})", ['userGroupName' =>$model->name]), 'operations');
            $model->delete();
        }
        else
        {
            return $this->redirect(['view', 'id' => $id,'message'=>'HaveChild']);
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the UserGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return UserGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserGroup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
