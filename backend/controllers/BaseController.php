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
            $this->redirect("/site/no-permission");
        }
    }
}
