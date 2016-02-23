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
    public function actionCreate()
    {
        $model = new UserGroup();
        $save_flag=false;

        if ($model->load(Yii::$app->request->post())) {
            $model=UserGroup::generateDefaultValue($model);
            $transaction = \Yii::$app->db->beginTransaction();
            try{
                if($model->save())
                {
                    $model->path=UserGroup::generatePath($model);
                    $model->save();
                    $transaction->commit();
                    $save_flag=true;
                }
            }catch(\Exception $e){
                $transaction->rollBack();
                $model->isNewRecord = true;
            }

        }

        if($save_flag)
        {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else
        {
            return $this->render('create', [
                'model' => $model,
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

            $model->path=UserGroup::generatePath($model);
            $model->save();
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
            $this->findModel($id)->delete();
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
