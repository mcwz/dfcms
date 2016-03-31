<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/20
 * Time: 13:46
 */

namespace backend\services\url;


use backend\libtool\TreeToSortArray;
use backend\models\Category;

class UrlGenerator
{
    public static function initByNodeId($nodeId)
    {
        $return='';
        $allNodes=Category::findAncestor($nodeId);
        //To Do 此处应完善成循环读到父级节点，然后拼出路径
        return $return;
    }

    public static function initSimpleByNodeId($nodeId)
    {
        //读出第一级节点的path并返回
        return "";
    }
}