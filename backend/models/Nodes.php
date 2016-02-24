<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/2/24
 * Time: 19:30
 */

namespace backend\models;


use backend\models\giimodels\NodesBase;

class Nodes extends NodesBase
{
    public function rules()
    {
        return [
            [['pid', 'name',  'attr_group_id', 'flow_group_id', 'path', 'status', 'created_at', 'updated_at'], 'required'],
            [['pid', 'pos', 'type', 'attr_group_id', 'flow_group_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'path'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 250]
        ];
    }
}