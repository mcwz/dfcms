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
}