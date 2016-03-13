<?php
namespace backend\controllers;

use backend\dao\AuthItemDao;
use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class TestController extends Controller
{
    public function actionTestMysql()
    {
        $db=Yii::$app->db;
        $result=$db->createCommand("SELECT attr FROM `content_attr` WHERE `content_id`='1'")->execute();
        var_dump($result);
    }

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
