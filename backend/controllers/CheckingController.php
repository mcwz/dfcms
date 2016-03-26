<?php

namespace backend\controllers;

use backend\models\Checking;
use backend\models\CheckStepUser;
use backend\models\Content;
use Yii;
use backend\models\CheckGroup;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CheckingController
 */
class CheckingController extends Controller
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


    /*
    content->status==编辑中
    根据content读到相应节点的审核流程，然后写进checking表
    [check:]然后检查本人是否在当前的最小步骤中
    如果在，那么检查审核方式
        如果是非联合，那么此步骤审核通过，否则，然后删掉此步骤的审核信息
        如果是联合，那么把自己的步骤中的status设为1，然后检查当前步骤中所有人是否都为1，如果是的话，审核通过，删掉此步骤审核信息
    然后再次检测，直到查不到checking操作步骤，那么置content-status记录为审核通过（同时调取审核通过的service，方便后续增加其他内容，前期这个service可为空值）

    content->status==审核中
    goto check
    */
    public function actionCheck($cid,$type='sendToCheck')
    {


        if(is_numeric($cid))
        {
            $content=Content::findOne(['id'=>$cid]);
            if($content)
            {
                if($content->status==Content::STATUS_EDITING && $type=='sendToCheck')
                {
                    Checking::saveCheckingSteps($cid);
                    Checking::ifICanCheck($content,Yii::$app->user->id);
                }

                if($content->status==Content::STATUS_CHECKING && $type=='sendToCheck')
                {
                    Checking::ifICanCheck($content,Yii::$app->user->id);
                    //check myself
                }
                //以下仅仅为了显示
                $checkStepUsersModels=CheckStepUser::getCheckStepUsersByContentId($cid);
                if($checkStepUsersModels)
                {
                    return $this->render('check',[
                        'content'=>$content,
                        'checkStepUsersModels'=>$checkStepUsersModels
                    ]);
                }
                else
                {//可能是没有审核流程，那么就直接通过吧
                    return $this->redirect('/content/index');
                }
            }
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionSendCheck($cid)
    {

    }



    /**
     * Finds the CheckGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return CheckGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CheckGroup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
