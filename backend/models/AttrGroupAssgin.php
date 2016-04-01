<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/6
 * Time: 9:04
 */

namespace backend\models;

use backend\models\giimodels\AttrGroupAssignBase;

class AttrGroupAssgin extends AttrGroupAssignBase
{
    public static function getAttrGroupAssign($attrGroupId)
    {
        $connection = \Yii::$app->db;
        return $groupAssign = $connection->createCommand('SELECT attr_group_assign.id as id, attrs.name as attr_name,attr_group.name as attr_group_name,attrs.id as attr_id FROM attrs,attr_group,attr_group_assign WHERE attr_group_assign.group_id='.$attrGroupId.' AND attr_group_assign.group_id=attr_group.id AND attr_group_assign.attr_id=attrs.id')->queryAll();
    }


    /**
     * 属性与属性组对应操作
     * @param $model
     * @throws \yii\db\Exception
     */
    public static function assign($model)
    {
        $connection = \Yii::$app->db;
        $now=time();

        $sql_delete='DELETE FROM attr_group_assign WHERE group_id='.$model->groupId;
        $insert_array=array();
        if(is_array($model->attrsId))
        {
            foreach($model->attrsId as $attrId)
            {
                $insert_array[]=array($attrId,$model->groupId,$now);
            }
        }

        $transaction = $connection->beginTransaction();
        try {
            $connection->createCommand($sql_delete)->execute();
            if(count($insert_array)>0)
            $connection->createCommand()->batchInsert('attr_group_assign', ['attr_id', 'group_id','created_at'], $insert_array)->execute();
            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
        }
    }

    public static function processAssign($assign_array)
    {
        $attrIds=array();
        if(is_array($assign_array))
        {
            foreach($assign_array as $assign)
            {
                $attrIds[]=$assign['attr_id'];
            }
        }
        return $attrIds;
    }
}