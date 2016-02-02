<?php
namespace backend\models;

use Yii;
use backend\models\giimodels\AuthItemBase;

/**
 * UserManage
 */
class AuthItem extends AuthItemBase
{
    const AUTH_ITEM_MODULE = 2;
    const AUTH_ITEM_ROLE = 1;

	public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @return array
     */
    public static function getSearchStatus()
    {
        return [
            '' => Yii::t('app', 'ALL'),
            self::AUTH_ITEM_MODULE => Yii::t('app', 'AUTH_ITEM_MODULE'),
            self::AUTH_ITEM_ROLE => Yii::t('app', 'AUTH_ITEM_ROLE'),
        ];
    }
    /**
     * @return array
     */
    public static function getType()
    {
        return [
            self::AUTH_ITEM_MODULE => Yii::t('app', 'AUTH_ITEM_MODULE'),
            self::AUTH_ITEM_ROLE => Yii::t('app', 'AUTH_ITEM_ROLE'),
        ];
    }


    /**
     * @return string
     */
    public function generateType()
    {
            switch ($this->type) {
                case self::AUTH_ITEM_MODULE :return Yii::t('app', 'AUTH_ITEM_MODULE');
                    break;
                case self::AUTH_ITEM_ROLE :return Yii::t('app', 'AUTH_ITEM_ROLE');
                    break;
                
                default:
                    return '';
                    break;
            }

    }
}
