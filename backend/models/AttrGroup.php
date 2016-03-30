<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/2/28
 * Time: 14:01
 */

namespace backend\models;


use backend\models\giimodels\AttrGroupBase;

class AttrGroup extends AttrGroupBase
{
    public static function getAttrGroups()
    {
        $connection = \Yii::$app->db;
        return $connection->createCommand('SELECT * FROM attr_group order by id')->queryAll();
    }

    public static function getAttrGroupNameById($id)
    {
        if(is_numeric($id))
        {
            $attrGroup=AttrGroup::findOne($id);
            if($attrGroup)
            {
                return $attrGroup->name;
            }
        }
        return \Yii::t('app','No One');
    }
}