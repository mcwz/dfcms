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
    /**
     * @return array
     */
    public static function getAttrTypes()
    {
        return \backend\services\attr\AttrFactory::getAttrType();
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllAttr()
    {
        return Attrs::find()->orderBy('id') ->all();
    }
}