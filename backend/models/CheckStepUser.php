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
    /**
     * @param $checkStep
     * @param $users4Check
     * @return int
     * @throws \yii\db\Exception
     */
    public static function createSteps($checkStep, $users4Check)
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


    /**
     * 根据提供的$checkStepUserId删除check_step_user表中的数据，同时删除还没有审核的流程记录
     * @param $checkStepUserId
     * @return bool
     * @throws \yii\db\Exception
     */
    public static function deleteCheckStepUser($checkStepUserId)
    {
        $checkStepUser=CheckStepUser::findOne($checkStepUserId);
        if($checkStepUser)
        {
            $connection=\Yii::$app->db;
            $transaction = $connection->beginTransaction();
            try {
                Checking::deleteCheckingByCheckStepUserId($checkStepUser->id);
                $checkStepUser->delete();
                $transaction->commit();
                return true;
            } catch(\Exception $e) {
                $transaction->rollBack();
            }
        }
        return false;
    }


    /**
     * @param $contentId
     * @return array|null
     */
    public static function getCheckStepUsersByContentId($contentId)
    {
        if(is_numeric($contentId))
        {
            $content=Content::findOne($contentId);
            if($content!==null)
            {
                $node = Category::findOne($content->node_id);
                if($node!==null)
                {
                    //一直找，直到在本级或者上级找到checkGroup
//                    $checkGroup=CheckGroup::findOne($node->check_group_id);
                    $checkGroup = Category::getUntilCheckGroup($node);
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


    /**
     * @param $stepId
     * @param $userIdArray
     * @return int
     * @throws \yii\db\Exception
     */
    public static function addUsersToCheckStep($stepId, $userIdArray)
    {
        $insertArray=array();
        $created_at=time();
        foreach($userIdArray as $userId)
        {
            $insertArray[]=array('step_id'=>$stepId,'user_id'=>$userId,'created_at'=>$created_at);
        }
        return \Yii::$app->db->createCommand()->batchInsert('check_step_user', ['step_id', 'user_id','created_at'], $insertArray)->execute();

    }


    /**
     * @param $checkStepId
     * @return static[]
     */
    public static function getCheckStepUsersByCheckStepId($checkStepId)
    {
        return CheckStepUser::findAll(['step_id'=>$checkStepId]);
    }


}