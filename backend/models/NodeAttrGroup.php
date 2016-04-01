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
    /**
     * @param $groupId
     * @return array|null
     */
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

    /**
     * @param $categoryIds
     * @return array|null
     */
    public static function getCategoryAttrGroupByCategoryIds($categoryIds)
    {
        if(is_array($categoryIds) && count($categoryIds)>0)
        {
            $sql="SELECT * FROM node_attr_group WHERE node_id in(".implode(',',$categoryIds).")";
            return \Yii::$app->db->createCommand($sql)->queryAll();
        }
        return null;
    }

    /**
     * @param $categoryId
     * @return array|bool|null
     */
    public static function getAttrGroupByCategoryId($categoryId)
    {
        if(is_numeric($categoryId))
        {
            $sql="SELECT * FROM node_attr_group WHERE node_id =".$categoryId;
            return \Yii::$app->db->createCommand($sql)->queryOne();
        }
        return null;
    }
}