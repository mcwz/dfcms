<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/22
 * Time: 10:02
 */

namespace backend\models;


use backend\models\giimodels\CheckStepUserBase;

class CheckStepUser extends CheckStepUserBase
{
    public static function createSteps($checkStep,$users4Check)
    {
        $userIds=$users4Check->userIds;
        $insert_array=array();
        $created_at=time();
        foreach($userIds as $oneUserId)
        {
            $insert_array[]=array('step_id'=>$checkStep->id,'user_id'=>$oneUserId,'created_at'=>$created_at);
        }
        return \Yii::$app->db->createCommand()->batchInsert('check_step_user',['step_id','user_id','created_at'],$insert_array)->execute();
    }


    public static function getCheckStepUsersByContentId($contentId)
    {
        if(is_numeric($contentId))
        {
            $content=Content::findOne($contentId);
            if($content!==null)
            {
                $node=Nodes::findOne($content->node_id);
                if($node!==null)
                {
                    $checkGroup=CheckGroup::findOne($node->check_group_id);
                    if($checkGroup)
                    {
                        return \Yii::$app->db->createCommand("SELECT check_step_user.id as check_step_user_id,check_step_user.user_id,
check_step.id as check_step_id,check_step.step,check_step.group_id,check_step.type,
user.username FROM check_step_user,check_step,`user` WHERE
                                      check_step.group_id=".$checkGroup->id." AND check_step_user.step_id=check_step.id AND user.id=check_step_user.user_id ORDER BY check_step.step ASC")
                            ->queryAll();
                    }
                }
            }
        }
        return null;
    }
}