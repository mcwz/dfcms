<?php

namespace backend\controllers;

use Yii;
use backend\models\AuthItem;
use backend\models\search\AuthItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthItemController implements the CRUD actions for AuthItem model.
 */
class AuthItemController extends Controller
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
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
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
                $role_permission = $auth->createPermission($model->name);
            else
                $role_permission = $auth->createRole($model->name);
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
            }
            else
            {
                $role_permission= $auth->getRole($id);
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
            }
            else
            {
                $rolePermission=$auth->getRole($model->name);
            }

            $auth->remove($rolePermission);

        }
        
        return $this->redirect(['index']);
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
