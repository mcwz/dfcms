<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/20
 * Time: 13:56
 */

namespace backend\libtool;


class TreeToSortArray
{
    public static function parseASC($tree,$leafId)
    {
        $return=array();
        $maxLoopTimes=count($tree)*count($tree);
        $i=$k=0;
        if(is_array($tree) && is_numeric($leafId))
        {
            while(true)
            {
                if(count($tree)<=0 || $k>$maxLoopTimes)
                {
                    break;
                }
                if($i>=count($tree))
                {
                    $i=0;
                }

                if($leafId===$tree[$i]['id'])
                {
                    $return[]=$tree[$i];
                    $leafId=$tree[$i]['pid'];
                    array_splice($tree,$i,1);
                    $i=0;
                }
                else
                {
                    $i++;
                }

                $k++;
            }
        }
        return $return ;
    }
}