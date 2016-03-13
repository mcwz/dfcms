<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/6
 * Time: 14:45
 */

namespace backend\models;


use backend\models\giimodels\NodeAttrGroupBase;

class NodeAttrGroup extends NodeAttrGroupBase
{
    public static function getAttrModelByGroup($groupId)
    {
        $assgined=AttrGroupAssgin::findAll(['group_id'=>$groupId]);
        $array_attrId=array();
        foreach($assgined as $oneAssign)
        {
            $array_attrId[]=$oneAssign['attr_id'];
        }
        if(count($array_attrId)>0)
            return \Yii::$app->db->createCommand("SELECT * FROM attrs WHERE id in(".implode(',',$array_attrId).")")->queryAll();
        else
            return null;
    }
}