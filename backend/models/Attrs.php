<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/5
 * Time: 17:38
 */

namespace backend\models;


use backend\models\giimodels\AttrsBase;

class Attrs extends AttrsBase
{
    public static function getAttrTypes()
    {
        return \backend\services\attr\AttrFactory::getAttrType();
    }

    public static function getAllAttr()
    {
        return Attrs::find()->orderBy('id') ->all();
    }
}