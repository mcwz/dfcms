<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "user_group_assign".
 *
 * @property string $user_id
 * @property string $group_id
 * @property string $created_at
 */
class UserGroupAssignBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_group_assign';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'group_id', 'created_at'], 'required'],
            [['user_id', 'group_id', 'created_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
