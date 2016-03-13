<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/10
 * Time: 16:19
 */

namespace backend\services\activeAttr;


use yii\helpers\Html;

class ActiveAttrFormFactory
{
    const TYPE_TEXT=1;
    const TYPE_AREATEXT=2;
    const TYPE_RADIO=3;
    const TYPE_CHECKBOX=4;

    public static function build($form,$attrPrototypeFromDatabase)
    {
        $array_form=array();
        $model=ActiveAttrFactory::build($attrPrototypeFromDatabase);
        if(is_array($attrPrototypeFromDatabase))
        {
            foreach($attrPrototypeFromDatabase as $oneAttr)
            {
                $array_form[]=self::building($form,$model,$oneAttr);
            }
        }

        return $array_form;
    }

    /**
     * @param $form
    @param Model $model the data model
     * @param $oneAttr
     * @return null|string
     */
    public static function building($form, $model, $oneAttr)
    {
        $form_temp=null;
        if(isset($oneAttr['type']))
        {
            switch($oneAttr['type'])
            {
                case self::TYPE_TEXT:$form_temp=$form->field($model,$oneAttr['name'])->textInput();break;
                case self::TYPE_AREATEXT:$form_temp=Html::field($model,$oneAttr['name'])->textArea();break;
            }
        }
        return $form_temp;
    }
}