<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/20
 * Time: 13:46
 */

namespace backend\services\url;


use backend\libtool\TreeToSortArray;
use backend\models\Nodes;

class UrlGenerator
{
    public static function initByNodeId($nodeId)
    {
        $return='';
        $allNodes=Nodes::getAllParentNodes($nodeId);
        if($allNodes)
        {
            $sortedTree=TreeToSortArray::parseASC($allNodes,$nodeId);
            foreach($sortedTree as $aLeaf)
            {
                if((int)$aLeaf['type']===Nodes::TYPE_SITE)
                {
                    break;
                }
                if(trim($aLeaf['path'])!='')
                {
                    $return='/'.$aLeaf['path'].$return;
                }
            }
        }
        return $return;
    }

    public static function initSimpleByNodeId($nodeId)
    {
        $lastLeaf=array();
        $allNodes=Nodes::getAllParentNodes($nodeId);
        if($allNodes)
        {
            $sortedTree=TreeToSortArray::parseASC($allNodes,$nodeId);
            foreach($sortedTree as $aLeaf)
            {
                if((int)$aLeaf['type']===Nodes::TYPE_SITE)
                {
                    break;
                }
                else
                {
                    $lastLeaf=$aLeaf;
                }
            }
        }
        return $lastLeaf['path'];
    }
}