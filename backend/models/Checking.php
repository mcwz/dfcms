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
    /**
     * 把每个人的审核信息保存到数据表
     * @param $cid
     * @throws \yii\db\Exception
     */
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

    /**
     * 判定自己能否审核，也会同时判断临近的几个步骤，如果相邻的步骤都能审核，那么会直接通过
     * @param $content
     * @param $uid
     * @throws \yii\db\Exception
     */
    public static function ifICanCheck($content, $uid)
    {
        $connection=Yii::$app->db;

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

    public static function getCheckingStatusByCheckStepUsers($checkStepUsersModels)
    {
        $checkingStatus = array();
        if ($checkStepUsersModels) {
            $check_step_user_ids = array();
            foreach ($checkStepUsersModels as $checkStepUsersModel) {
                $check_step_user_ids[] = $checkStepUsersModel['check_step_user_id'];
            }
            if (count($check_step_user_ids) > 0) {
                $sql = "SELECT * FROM " . parent::tableName() . " WHERE check_step_user_id in(" . implode(',', $check_step_user_ids) . ")";
                $allChecking = Yii::$app->db->createCommand($sql)->queryAll();
                if ($allChecking) {
                    foreach ($allChecking as $checking) {
                        $checkingStatus['checkStep_' . $checking['check_step_id']]['userId_' . $checking['user_id']] = $checking['checked'];
                    }
                }
            }
        }
        return $checkingStatus;
    }


    public static function deleteCheckingByCheckStepUserId($checkStepUserId)
    {
        return Yii::$app->db->createCommand("DELETE FROM ".parent::tableName()." WHERE checked=0 AND check_step_user_id=".$checkStepUserId)->execute();
    }
}