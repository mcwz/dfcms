<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/21
 * Time: 18:24
 */

namespace backend\models;


use backend\models\giimodels\CheckStepBase;
use Yii;

class CheckStep extends CheckStepBase
{
    const CHECK_STEP_TYPE_UNION=1;
    const CHECK_STEP_TYPE_NON_UNION=2;


    /**
     * @return array
     */
    public static function getCheckTypes()
    {
        return [
            self::CHECK_STEP_TYPE_NON_UNION => Yii::t('app', 'CHECK_STEP_TYPE_NON_UNION'),
            self::CHECK_STEP_TYPE_UNION => Yii::t('app', 'CHECK_STEP_TYPE_UNION'),

        ];
    }

    /**
     * @param $type
     * @return string
     */
    public static function getLabel($type)
    {
        switch($type)
        {
            case self::CHECK_STEP_TYPE_UNION :return Yii::t('app', 'CHECK_STEP_TYPE_UNION'); break;
            case self::CHECK_STEP_TYPE_NON_UNION :return Yii::t('app', 'CHECK_STEP_TYPE_NON_UNION'); break;
        }
    }


    /**
     * @param $gid
     * @return array|null
     */
    public static function getAssignSteps($gid)
    {
        $result=null;
        if(is_numeric($gid))
        {
            $connection=Yii::$app->db;
//            $result=$connection->createCommand("SELECT *,check_step_user.id as check_step_user_id FROM check_step,check_step_user,user WHERE check_step.group_id=".$gid." AND check_step.id=check_step_user.step_id AND check_step_user.user_id=user.id order by step ASC ")->queryAll();
            $command=$connection->createCommand("SELECT t.*,user.username FROM (SELECT check_step.*,check_step_user.user_id,check_step_user.id as check_step_user_id FROM `check_step` left join check_step_user on check_step.id=check_step_user.step_id WHERE check_step.group_id=".$gid.") AS t LEFT JOIN user ON user.id=t.user_id order by step ASC");
            return $command->queryAll();
        }
        return $result;
    }


    /**
     * 当删除了某一审核组中的某一步时，大于它的step都要减一
     * @param $group_id
     */
    public static function updateStepNumBy($checkStep)
    {
        Yii::$app->db->createCommand("UPDATE ".parent::tableName()." SET step=step-1 WHERE step>".$checkStep->step." AND group_id=".$checkStep->group_id);
    }

    /**
     * @param $id
     * @return bool
     * @throws \yii\db\Exception
     */
    public static function deleteById($id)
    {
        $connection=Yii::$app->db;
        $checkStep=CheckStep::findOne($id);
        if($checkStep)
        {
            $checkStepUsers=CheckStepUser::getCheckStepUsersByCheckStepId($checkStep->id);
            $transaction = $connection->beginTransaction();
            try {
                foreach($checkStepUsers as $checkStepUser)
                {
                    Checking::deleteCheckingByCheckStepUserId($checkStepUser->id);
                    $checkStepUser->delete();
                }
                self::updateStepNumBy($checkStep);
                $checkStep->delete();
                CheckGroup::updateStepCount($checkStep->group_id);
                $transaction->commit();
                return true;
            } catch(\Exception $e) {
                $transaction->rollBack();
            }
        }
        return false;
    }

}