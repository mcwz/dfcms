<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/8
 * Time: 11:21
 */

namespace backend\models;


use backend\models\giimodels\ContentBase;
use Yii;

class Content extends ContentBase
{
    const STATUS_EDITING=1;
    const STATUS_SAVED=2;
    const STATUS_FALLBACK=3;
    const STATUS_CHECKING=4;
    const STATUS_PUB=5;
    const STATUS_DELETED=0;

    public static function getSearchStatus()
    {
        return [
            '' => Yii::t('app', 'ALL'),
            self::STATUS_EDITING => Yii::t('app', 'STATUS_EDITING'),
            self::STATUS_SAVED => Yii::t('app', 'STATUS_SAVED'),
            self::STATUS_FALLBACK => Yii::t('app', 'STATUS_FALLBACK'),
            self::STATUS_CHECKING => Yii::t('app', 'STATUS_CHECKING'),
            self::STATUS_PUB => Yii::t('app', 'STATUS_PUB'),
            self::STATUS_DELETED => Yii::t('app', 'STATUS_DELETED'),
        ];
    }

    public static function getStatusStr($status)
    {
        switch ($status) {
            case self::STATUS_EDITING:
                return Yii::t('app', 'STATUS_EDITING');
                break;
            case self::STATUS_SAVED:
                return Yii::t('app', 'STATUS_SAVED');
                break;
            case self::STATUS_FALLBACK:
                return Yii::t('app', 'STATUS_FALLBACK');
                break;
            case self::STATUS_CHECKING:
                return Yii::t('app', 'STATUS_CHECKING');
                break;
            case self::STATUS_PUB:
                return Yii::t('app', 'STATUS_PUB');
                break;
            case self::STATUS_DELETED:
                return Yii::t('app', 'STATUS_DELETED');
                break;
            default:
                return Yii::t('app', 'Unknown');
        }
    }
}