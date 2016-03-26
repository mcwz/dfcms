<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/23
 * Time: 10:07
 */

namespace backend\models;


use backend\hooks\AfterContentCheckComplete;
use backend\models\giimodels\CheckingBase;
use Yii;

class Checking extends CheckingBase
{
    public static function saveCheckingSteps($cid)
    {
        $content=Content::findOne($cid);
        if($content)
        {
            $checkStepUsersModels=CheckStepUser::getCheckStepUsersByContentId($cid);

            $array_insert=array();
            $now=time();
            if($checkStepUsersModels)
            {
                foreach($checkStepUsersModels as $checkStepUsersModel)
                {
                    $array_insert[]=array('check_step_user_id'=>$checkStepUsersModel['check_step_user_id'],
                        'step'=>$checkStepUsersModel['step'],
                        'type'=>$checkStepUsersModel['type'],
                        'user_id'=>$checkStepUsersModel['user_id'],
                        'check_step_id'=>$checkStepUsersModel['check_step_id'],
                        'checked'=>0,
                        'checked_time'=>0,
                        'content_id'=>$cid,
                        'created_at'=>$now);
                }
                if(count($array_insert)>0)
                {
                    Yii::$app->db->createCommand()->batchInsert('checking',
                        array('check_step_user_id','step','type','user_id','check_step_id','checked','checked_time','content_id','created_at')
                        ,$array_insert)->execute();
                }

            }
            $content->status=Content::STATUS_CHECKING;
            $content->save();
        }
    }

    public static function ifICanCheck($content,$uid)
    {
        $connection=Yii::$app->db;
//        $nowCheckStepResult=$connection->createCommand("SELECT min(step) as now_step FROM checking WHERE content_id=".$content->id)->queryOne();
//        if($nowCheckStepResult)
//        {
//            $nowCheckStep=$nowCheckStepResult['now_step'];
//            $checkingRecords=$connection->createCommand("SELECT * FROM checking
//                          WHERE content_id=".$content->id." AND user_id=".$uid." AND checked=0 AND step=".$nowCheckStep." ORDER BY step ASC")->queryAll();
//            if($checkingRecords && count($checkingRecords)>0)
//            {
//                    if($checkingRecords[0]['type']==CheckStep::CHECK_STEP_TYPE_UNION)
//                    {
//                        $connection->createCommand("UPDATE checking SET checked=1 WHERE content_id=".$content->id." AND  user_id=".$uid)->execute();
//                    }
//                    else
//                    {
//                        $connection->createCommand("UPDATE checking SET checked=1 WHERE id=".$checkingRecord['id'])->execute();
//                    }
//            }
//        }

        $unCheckingSteps=array();
        $sql="SELECT DISTINCT(step) as now_step FROM checking WHERE checked=0 AND content_id=".$content->id." ORDER BY step ASC";
        $nowCheckStepResult=$connection->createCommand($sql)->queryAll();
        if($nowCheckStepResult)
        {
            foreach ($nowCheckStepResult as $item) {
                $unCheckingSteps[]=$item['now_step'];
            }
        }

        $allThisUserUnCheckedSteps=$connection->createCommand("SELECT * FROM checking WHERE checked=0 AND user_id=".$uid." AND content_id=".$content->id." ORDER BY step ASC ")->queryAll();
        if($allThisUserUnCheckedSteps && count($allThisUserUnCheckedSteps)>0 && count($unCheckingSteps)>0)
        {
            while(count($unCheckingSteps)>0)
            {
                $nowCheckStep=$unCheckingSteps[0];
                if(count($allThisUserUnCheckedSteps)<=0)
                    break;
                if($nowCheckStep==$allThisUserUnCheckedSteps[0]['step'])
                {//can check
                    if($allThisUserUnCheckedSteps[0]['type']==CheckStep::CHECK_STEP_TYPE_UNION)
                    {
                        $connection->createCommand("UPDATE checking SET checked=1 WHERE step=".$nowCheckStep." AND content_id=".$content->id." AND  user_id=".$uid)->execute();
                    }
                    else
                    {
                        $connection->createCommand("UPDATE checking SET checked=1 WHERE step=".$nowCheckStep." AND content_id=".$content->id)->execute();
                    }

                    //记录一下日志
                    $checkLog=new CheckLog();
                    $checkLog->user_id=$uid;
                    $checkLog->checking_id=$allThisUserUnCheckedSteps[0]['id'];
                    $checkLog->content_id=$content->id;
                    $checkLog->created_at=time();
                    $checkLog->save();

                    Yii::info( Yii::t('app/log', "User({id:userId}) Check content(content id:{contentId},title:{contentTitle} at step({step}))", ['userId' =>$uid,'contentId'=>$content->id,'contentTitle'=>$content->title,'step'=>$allThisUserUnCheckedSteps[0]['id']]), 'operations');

                    //看看当前步骤处理完否，如果处理完，就是当前步骤没有checked=0的话就要走while，并把当前步骤的删除。
                    $nonChecked=$connection->createCommand("SELECT count(*) as nonChecked FROM checking WHERE checked=0 AND step=".$nowCheckStep." AND content_id=".$content->id)->queryOne();
                    if($nonChecked['nonChecked']<=0)
                    {
                        array_splice($unCheckingSteps,0,1);
                        array_splice($allThisUserUnCheckedSteps,0,1);
                    }
                    else
                    {
                        break;
                    }
                }
                else
                {
                    break;
                }
            }
        }


        $contentCheckLast=$connection->createCommand("SELECT count(*) as nonChecked FROM checking WHERE checked=0 AND content_id=".$content->id)->queryOne();
        if($contentCheckLast['nonChecked']<=0)
        {//竟然审核完了
            $content->status=Content::STATUS_PUB;
            $content->save();
            $afterCheckComplete=new AfterContentCheckComplete();
            $afterCheckComplete->init(['content'=>$content,'user_id'=>$uid]);
            $afterCheckComplete->run();
        }

    }
}