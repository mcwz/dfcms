<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/2/16
 * Time: 10:07
 */

namespace backend\libtool;


class ModelError
{
    public static function generateErrors($errors)
    {
        if(is_array($errors) && count($errors)>0)
        {
            $htmlStr='<div class="row"><div class="bg-danger"><ul>';
            foreach($errors as $attr=>$error_arr)
            {
                foreach($error_arr as $oneError)
                {
                    $htmlStr.='<li>'.$attr.':'.$oneError.'</li>';
                }
            }
            $htmlStr.='</ul></div></div>';
            return $htmlStr;
        }

        return '';
    }
}