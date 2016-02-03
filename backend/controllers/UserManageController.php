<?php

namespace backend\controllers;

use Yii;
use backend\models\UserManage;
use backend\models\forms\UserAssignForm;
use backend\models\search\UserManageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * UserManageController implements the CRUD actions for UserManage model.
 */
class UserManageController extends Controller
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
     * Lists all UserManage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserManageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserManage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserManage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserManage();
        $model->setScenario('Create');
        $saved_flag=false;
        if ($model->load(Yii::$app->request->post())) {
            $model->password_hash=Yii::$app->security->generatePasswordHash($model->password_hash);
            $model->auth_key=Yii::$app->security->generateRandomString();
            $model->updated_at=0;
            $model->created_at = time();  
            if($model->save())
            {
                $saved_flag=true;
            }
            
        } 

        if($saved_flag)
        {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            //print_r($model->getErrors());
            $model->password_hash='';
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserManage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->setScenario('Update');

        //Got the last username and password for unchange
        $username=$model->username;
        $password_hash=$model->password_hash;

        $update_flag=false;

        if ($model->load(Yii::$app->request->post())) {
            $model->username=$username;
            if($model->password_hash!='')
            {
                $model->password_hash=Yii::$app->security->generatePasswordHash($model->password_hash);
            }
            else
            {
                $model->password_hash=$password_hash;
            }
            $model->updated_at=time();
            if($model->save())
            {
                $update_flag=true;
            }            
        } 

        if($update_flag)
        {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            $model->password_hash='';
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserManage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Give a user empowerment.
     * 
     * @param integer $id
     * @return mixed
     */
    public function actionAuthorize($id)
    {
        $model=new UserAssignForm();

        if (($model->user = UserManage::findOne($id)) !== null)
        {
            $auth = Yii::$app->authManager;

            $array_dbassignments=array();
            if(is_array($dbassignments=$auth->getAssignments($id)))
            {
                foreach ($dbassignments as $key => $value) {
                    $array_dbassignments[]=$value->roleName;
                }
            }

            $model->assignments=$array_dbassignments;
            $allRoles=$auth->getRoles();
                
            if ($model->load(Yii::$app->request->post())) {
                $assignments=$model->assignments;
                $auth->revokeAll($id);
                
                if(is_array($assignments))
                {
                    foreach($assignments as $rolename)
                    {
                        $role=$auth->getRole($rolename);
                        $auth->assign($role,$id);
                    } 
                }
               

            }
            return $this->render('authorize', [
                'model' => $model,
                'allRoles'=>$allRoles,
            ]);
        }

    }

    /**
     * Finds the UserManage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserManage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserManage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}
