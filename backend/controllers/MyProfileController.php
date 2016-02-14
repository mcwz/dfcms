<?php
namespace backend\controllers;

use backend\models\forms\ChangeProfileForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\UserManage;
/**
 * Site controller
 */
class MyProfileController extends Controller
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
                        'actions' => ['change-profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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


    /**
     * @param
     * @return string|\yii\web\Response
     */
    public function actionChangeProfile()
    {
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $user=$this->findModel();
        $model = new ChangeProfileForm();
        $model->email=$user->email;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if($user!==null)
            {
                $update_flag=false;
                if($model->newPassword!=='')
                {
                    $user->password_hash=Yii::$app->security->generatePasswordHash($model->newPassword);
                    $update_flag=true;
                }
                if($model->email!=='')
                {
                    $user->email=$model->email;
                    $update_flag=true;
                }
                if($update_flag)
                {
                    $user->updated_at=time();
                    $user->setScenario('Update');
                    $user->save();
                    $model->password='';
                    $model->newPassword='';
                    $model->confirmPassword='';
                    $model->email=$user->email;
                    return $this->render('change-profile', [
                        'model' => $model,
                        'message'=> Yii::t('app','Save success.')
                    ]);
                }
            }
        } else {
            return $this->render('change-profile', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Finds the UserManage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserManage the loaded model
     */
    protected function findModel()
    {
        if (($model =  UserManage::findOne(Yii::$app->user->identity->getId())) !== null) {
            return $model;
        }
        return null;
    }
}
