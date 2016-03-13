<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/12
 * Time: 18:07
 */

namespace backend\libtool;


class ObjectArrayParse
{
    public static function Object2Array($obj)
    {
        $_arr = is_object($obj)? get_object_vars($obj) : $obj;
        foreach ($_arr as $key => $val) {
            $val = (is_array($val)) || is_object($val) ? self::Object2Array($val) : $val;
            $arr[$key] = $val;
        }

        return $arr;
    }

}