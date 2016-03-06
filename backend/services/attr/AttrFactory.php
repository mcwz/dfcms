<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/2
 * Time: 21:06
 */

namespace backend\services\attr;

use Yii;


class AttrFactory
{
    const TYPE_TEXT=1;
    const TYPE_AREATEXT=2;
    const TYPE_RADIO=3;
    const TYPE_CHECKBOX=4;

    public static function build($data,$type)
    {
        switch($type)
        {
            case self::TYPE_TEXT:return new TextAttr($data);break;
            case self::TYPE_AREATEXT:return new AreaAttr($data);break;
            case self::TYPE_RADIO:return new RadioAttr($data);break;
            //case self::TYPE_CHECKBOX:
            default:throw new \Exception('You passed the wrong type.');
        }
    }

    public static function getAttrType()
    {
        return [
            self::TYPE_TEXT => Yii::t('app', 'TYPE_TEXT'),
            self::TYPE_AREATEXT => Yii::t('app', 'TYPE_AREATEXT'),
            self::TYPE_RADIO => Yii::t('app', 'TYPE_RADIO'),
            self::TYPE_CHECKBOX => Yii::t('app', 'TYPE_CHECKBOX'),
        ];
    }

    public static function getThisType($typeId)
    {
        $type_array=self::getAttrType();
        if(isset($type_array[$typeId]))
        {
            return $type_array[$typeId];
        }
        else
            return '';
    }
}