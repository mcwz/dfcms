<?php
namespace backend\models;

use Yii;
use backend\models\giimodels\UserManageBase;

/**
 * UserManage
 */
class UserManage extends UserManageBase
{
	const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    public function scenarios()
	{
		return [
			'Create' => ['username', 'password_hash','email','created_at','updated_at','status'],
			'Update' => ['username', 'password_hash','email','created_at','updated_at','status'],
		];
	}

	public function rules()
	{
		return [
		[['username','password_hash'],'required', 'on' => ['Create']],
		[['email','status'], 'required', 'on' => ['Create', 'Update']],
		[['status'], 'integer'],
		[['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255, 'on' => ['Create', 'Update']],
		[['username'], 'unique', 'on' => ['Create']],
        [['email'], 'unique', 'on' => ['Create', 'Update']],
        ];
	}

	/**
     * @return array
     */
    public static function getSearchStatus()
    {
        return [
            '' => Yii::t('app', 'ALL'),
            self::STATUS_ACTIVE => Yii::t('app', 'STATUS_ACTIVE'),
            self::STATUS_DELETED => Yii::t('app', 'STATUS_DELETED'),
        ];
    }
    /**
     * @return array
     */
    public static function getStatus()
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'STATUS_ACTIVE'),
            self::STATUS_DELETED => Yii::t('app', 'STATUS_DELETED'),
        ];
    }


    /**
     * @return string
     */
    public function generateStatus()
    {
    		switch ($this->status) {
    			case self::STATUS_ACTIVE :return Yii::t('app', 'STATUS_ACTIVE');
    				break;
    			case self::STATUS_DELETED :return Yii::t('app', 'STATUS_DELETED');
    				break;
    			
    			default:
    				return '';
    				break;
    		}

    }
}
