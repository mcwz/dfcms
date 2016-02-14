<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;

/**
 * BaseController for login users OR RBAC check
 */
class BaseController extends Controller
{
    public function beforeAction($action)
    {
        if(parent::beforeAction($action))
        {
            if(Yii::$app->user->id!=null)
            {
                return true;
            }
            else
            {
                Yii::$app->user->setReturnUrl(Yii::$app->request->url);
                $this->redirect('/site/login?error=pl');
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    protected function checkRBAC($permissions)
    {
        if (!\Yii::$app->user->can($permissions)) {
            Yii::warning( Yii::t('app/log', "user(username:{username}) visit unauthorized web page(requestedRoute:{requestedRoute},defined moduleName:{moduleName})", ['username' =>Yii::$app->user->identity->username,'requestedRoute' =>$this->module->requestedRoute,'moduleName'=>$permissions ]),'operations');
            $this->redirect("/site/no-permission");
        }
    }
}
