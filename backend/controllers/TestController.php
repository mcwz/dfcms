<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class TestController extends Controller
{


    public function actionEmail()
    {
        $sendResult=Yii::$app->mailer->compose()
            ->setTo('yali114@sina.com')
            ->setSubject('Message subject')
            ->setTextBody('Plain text content')
            ->setHtmlBody('<b>HTML content</b>')
            ->send();
        echo $sendResult;
    }

}
