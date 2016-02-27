<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/2/24
 * Time: 19:30
 */

namespace backend\models;

use Yii;
use backend\models\giimodels\NodesBase;

class Nodes extends NodesBase
{
    const TYPE_SITE = 1;
    const TYPE_NODE = 2;

    public function rules()
    {
        return [
            [['pid', 'name',  'path', 'status', 'created_at', 'updated_at'], 'required'],
            [['pid', 'pos', 'type', 'attr_group_id', 'flow_group_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'path'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 250],
            ['type', 'in', 'range' => [self::TYPE_SITE, self::TYPE_NODE]]
        ];
    }



    public static function getAllNodesData()
    {
        $connection = \Yii::$app->db;
        $sql_str='SELECT * FROM nodes order by pos';
        $command = $connection->createCommand($sql_str);
        $allNodes = $command->queryAll();
        return $allNodes;
    }


    public static function getType()
    {
        return [
            self::TYPE_NODE => Yii::t('app', 'TYPE_NODE'),
            self::TYPE_SITE => Yii::t('app', 'TYPE_SITE'),
        ];
    }
}