<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\forms\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionEmail()
    {
        Yii::$app->mailer->compose()
            ->setFrom('from@domain.com')
            ->setTo('to@domain.com')
            ->setSubject('Message subject')
            ->setTextBody('Plain text content')
            ->setHtmlBody('<b>HTML content</b>')
            ->send();
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNoPermission()
    {
        return $this->render('no-permission');
    }

    /**
     * @param string $error
     * @return string|\yii\web\Response
     */
    public function actionLogin($error='')
    {
        $this->layout='login';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::info( Yii::t('app/log', "user(username:{username}) login success", ['username' =>$model->username]), 'operations');
            $this->redirect(Yii::$app->user->getReturnUrl());
            //return $this->goBack();
        } else {
            $message=($error=='pl'?Yii::t('app','Please Login'):'');
            return $this->render('login', [
                'model' => $model,
                'message'=>$message
            ]);
        }
    }

    public function actionLogout()
    {
        $username=Yii::$app->user->identity->username;
        Yii::$app->user->logout();
        Yii::info( Yii::t('app/log', "user(username:{username}) logout", ['username' =>$username]), 'operations');
        return $this->goHome();
    }
}
