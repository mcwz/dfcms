<?php
namespace backend\models\forms;

use Yii;
use yii\base\Model;
use backend\models\User;

/**
 * Login form
 */
class UsersForCheck extends Model
{
    public $userIds;

    public function rules()
    {
        return [
            ['userIds', 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userIds' => Yii::t('app', 'Users'),
        ];
    }
}
