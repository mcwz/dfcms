<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/21
 * Time: 9:31
 */

namespace backend\models;


use backend\models\giimodels\CheckGroupBase;
use Yii;

class CheckGroup extends CheckGroupBase
{
    public static function getGroupMaxStep($groupId)
    {
        $max_step=-1;
        if(is_numeric($groupId))
        {
            $sql=Yii::$app->db->createCommand("SELECT max(step) AS max_step FROM check_step WHERE group_id=".$groupId);
            $result=$sql->queryOne();
            if($result)
            {
                $max_step=$result['max_step']===null?0:$result['max_step'];
            }
        }
        return $max_step;
    }

    public static function updateStepCount($gid)
    {
        Yii::$app->db->createCommand("UPDATE `check_group` SET `step_count`=(SELECT count(*) FROM check_step WHERE group_id=".$gid.") WHERE id=".$gid)->execute();
    }

    public static function getCheckGroupNameById($id)
    {
        if(is_numeric($id))
        {
            $checkGroup=CheckGroup::findOne($id);
            if($checkGroup)
            {
                return $checkGroup->name;
            }
        }
        return Yii::t('app','No One');
    }
}