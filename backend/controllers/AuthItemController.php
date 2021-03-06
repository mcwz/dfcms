<?php

namespace backend\controllers;

use Yii;
use backend\models\AuthItem;
use backend\models\search\AuthItemSearch;
use backend\models\forms\RoleAddChildForm;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthItemController implements the CRUD actions for AuthItem model.
 */
class AuthItemController extends BaseController
{
    public function init()
    {
        parent::init();
        $this->checkRBAC("rbacModule");
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
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {

        Yii::info( Yii::t('app/log', "visit authItem list page"), 'operations');
            $searchModel = new AuthItemSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

    }

    /**
     * Displays a single AuthItem model.
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
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post())) {

            $auth = Yii::$app->authManager;
            if($model->type==AuthItem::AUTH_ITEM_MODULE)
            {
                Yii::info( Yii::t('app/log', "Create module(module name:{moduleName})", ['moduleName' =>$model->name]), 'operations');
                $role_permission = $auth->createPermission($model->name);
            }
            else
            {
                Yii::info( Yii::t('app/log', "Create role(role name:{roleName})", ['roleName' =>$model->name]), 'operations');
                $role_permission = $auth->createRole($model->name);
            }

            $role_permission->description = $model->description;
            $auth->add($role_permission);
            return $this->redirect(['view', 'id' => $model->name]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $role_or_permission=$model->type;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $auth = Yii::$app->authManager;
            if($role_or_permission==AuthItem::AUTH_ITEM_MODULE)
            {
                $role_permission= $auth->getPermission($id);
                Yii::info( Yii::t('app/log', "Update module(module name:{moduleName})", ['moduleName' =>$model->name]), 'operations');
            }
            else
            {
                $role_permission= $auth->getRole($id);
                Yii::info( Yii::t('app/log', "Update role(role name:{roleName})", ['roleName' =>$model->name]), 'operations');
            }
            $role_permission->description=$model->description;
            $auth->update($model->name,$role_permission);
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if($model)
        {
            $auth = Yii::$app->authManager;
            
            $role_or_permission=$model->type;

            if($role_or_permission==AuthItem::AUTH_ITEM_MODULE)
            {
                $rolePermission=$auth->getPermission($model->name);
                Yii::info( Yii::t('app/log', "Delete module(module name:{moduleName})", ['moduleName' =>$model->name]), 'operations');
            }
            else
            {
                $rolePermission=$auth->getRole($model->name);
                Yii::info( Yii::t('app/log', "Delete role(role name:{roleName})", ['roleName' =>$model->name]), 'operations');
            }

            $auth->remove($rolePermission);

        }
        
        return $this->redirect(['index']);
    }


    /**
     * 增加一个权限项目，调用Yii自带的RBAC完成保存操作
     * @param $id
     * @return string
     */
    public function actionAddChild($id)
    {
        $model=new RoleAddChildForm();
        $auth = Yii::$app->authManager;
        $allPermissions = $auth->getPermissions();
        if (($model->role = $auth->getRole($id)) !== null)
        {
            $array_db_permissions=array();
            if(is_array($db_permissions=$auth->getPermissionsByRole($id)))
            {
                foreach ($db_permissions as $key => $value) {
                    $array_db_permissions[]=$value->name;
                }
            }

            $model->childItems=$array_db_permissions;


            if ($model->load(Yii::$app->request->post())) {
                $childItems=$model->childItems;
                $parent=$model->role;
                $auth->removeChildren($parent);

                if(is_array($childItems))
                {
                    foreach($childItems as $permission_name)
                    {
                        $permission=$auth->getPermission($permission_name);
                        $auth->addChild($parent,$permission);
                    }
                    Yii::info( Yii::t('app/log', "Add Module to role(role name:{roleName})", ['roleName' =>$id]), 'operations');
                }


            }

        }
        return $this->render('add-child', [
            'model' => $model,
            'allPermissions' => $allPermissions,
        ]);

    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}
