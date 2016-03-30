<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/29
 * Time: 16:26
 */

namespace backend\models;


use backend\models\giimodels\CategoryTreepathsBase;
use Yii;

class CategoryTreepaths extends CategoryTreepathsBase
{
    public static function create($newId,$pid)
    {
        $sql="INSERT INTO ".parent::tableName()."(ancestor,descendant,path_length) SELECT t.ancestor,$newId,t.path_length+1 FROM ".parent::tableName()
        ." AS t WHERE t.descendant =$pid UNION SELECT $newId,$newId,0";
        Yii::$app->db->createCommand($sql)->execute();
    }

}