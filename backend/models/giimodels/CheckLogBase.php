<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "check_log".
 *
 * @property string $id
 * @property string $user_id
 * @property string $checking_id
 * @property string $content_id
 * @property string $created_at
 */
class CheckLogBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'check_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'checking_id', 'content_id', 'created_at'], 'required'],
            [['user_id', 'checking_id', 'content_id', 'created_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'checking_id' => Yii::t('app', 'Checking ID'),
            'content_id' => Yii::t('app', 'Content ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
