<?php

namespace backend\controllers;

use backend\models\UserGroup;
use backend\models\UserGroupAssign;
use Yii;
use backend\models\UserManage;
use backend\models\forms\UserAssignForm;
use backend\models\search\UserManageSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * UserManageController implements the CRUD actions for UserManage model.
 */
class UserManageController extends BaseController
{
    public function init()
    {
        parent::init();
        $this->checkRBAC("userManage");
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
     * Lists all UserManage models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::info( Yii::t('app/log', 'visit user list page'), 'operations');
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
        Yii::info( Yii::t('app/log', "check user(id:{user_id}) detail", ['user_id' => $id]), 'operations');
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
            $model->updated_at=time();
            $model->created_at = time();  
            if($model->save())
            {
                $saved_flag=true;
                Yii::info( Yii::t('app/log', "save user(username:{username})", ['username' => $model->username]), 'operations');
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
                Yii::info( Yii::t('app/log', "update user(username:{username})", ['username' => $model->username]), 'operations');
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
        Yii::info( Yii::t('app/log', "delete user(user_id:{user_id})", ['user_id' =>$id]), 'operations');
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

            //读取已经存在的权限
            $array_dbassignments=array();
            if(is_array($dbassignments=$auth->getAssignments($id)))
            {
                foreach ($dbassignments as $key => $value) {
                    $array_dbassignments[]=$value->roleName;
                }
            }

            //读取加入的用户组
            $array_db_user_group_assign=array();
            if(is_array($db_user_group_assign=UserGroupAssign::getUserGroupAssign($id)))
            {
                foreach ($db_user_group_assign as $key => $value) {
                    $array_db_user_group_assign[]=$value['group_id'];
                }
            }

            //将刚刚读取的已经赋值的内容转存给$model,以便于在展示页面的时候能显示默认值
            $model->assignments=$array_dbassignments;
            $model->user_group_assign=$array_db_user_group_assign;

            $allRoles=$auth->getRoles();
            $allGroup=UserGroup::getAllGroupData();
                
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
                    Yii::info( Yii::t('app/log', "user(user_id:{user_id}) assign", ['user_id' =>$id]), 'operations');
                }

                UserGroupAssign::setUserGroupAssign($id,$model->user_group_assign);

            }
            return $this->render('authorize', [
                'model' => $model,
                'allRoles'=>$allRoles,
                'allGroups'=>$allGroup,
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
