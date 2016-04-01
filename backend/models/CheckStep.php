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
            $result=$connection->createCommand("SELECT * FROM check_step,check_step_user,user WHERE check_step.group_id=".$gid." AND check_step.id=check_step_user.step_id AND check_step_user.user_id=user.id order by step ASC ")->queryAll();
        }
        return $result;
    }

}