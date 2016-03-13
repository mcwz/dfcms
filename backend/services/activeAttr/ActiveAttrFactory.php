<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/10
 * Time: 14:39
 */

namespace backend\services\activeAttr;


use backend\models\forms\AttrActiveModel;

class ActiveAttrFactory
{
    //need type,rules,labels
    public static function build($attrPrototypeFromDatabase)
    {
        $array_rules=array();
        $temp_rules=array();
        $array_attrName=array();
        $array_labels=array();
        $array_values=array();
        if(is_array($attrPrototypeFromDatabase)) {
            foreach ($attrPrototypeFromDatabase as $oneAttrPrototype) {
                $rules=explode(',',$oneAttrPrototype['rules']);
                foreach($rules as $ex_rule)
                {
                    if(isset($temp_rules[$ex_rule]))$temp_rules[$ex_rule][]=$oneAttrPrototype['name'];
                    else $temp_rules[$ex_rule]=array($oneAttrPrototype['name']);
                }
                $array_attrName[]=$oneAttrPrototype['name'];
                $array_labels[$oneAttrPrototype['name']]=$oneAttrPrototype['label'];
                if(isset($oneAttrPrototype['value']))
                    $array_values[$oneAttrPrototype['name']]=$oneAttrPrototype['value'];
            }
        }

        foreach ($temp_rules as $key=>$temp_rule) {
            $array_rules[]=array($temp_rule,$key);
        }
        $attrActiveModel=new AttrActiveModel(['rules'=>$array_rules,'labels'=>$array_labels,'array_attrName'=>$array_attrName]);
        foreach($array_values as $attrName=>$oneAttrValue)
        {
            $attrActiveModel->$attrName=$oneAttrValue;
        }
        return $attrActiveModel;
    }
}