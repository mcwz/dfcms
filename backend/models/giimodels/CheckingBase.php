<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "checking".
 *
 * @property string $id
 * @property string $check_step_user_id
 * @property integer $step
 * @property integer $type
 * @property string $user_id
 * @property string $check_step_id
 * @property integer $checked
 * @property string $checked_time
 * @property string $content_id
 * @property string $created_at
 */
class CheckingBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'checking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['check_step_user_id', 'step', 'type', 'user_id', 'check_step_id', 'checked_time', 'content_id', 'created_at'], 'required'],
            [['check_step_user_id', 'step', 'type', 'user_id', 'check_step_id', 'checked', 'checked_time', 'content_id', 'created_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'check_step_user_id' => Yii::t('app', 'Check Step User ID'),
            'step' => Yii::t('app', 'Step'),
            'type' => Yii::t('app', 'Type'),
            'user_id' => Yii::t('app', 'User ID'),
            'check_step_id' => Yii::t('app', 'Check Step ID'),
            'checked' => Yii::t('app', 'Checked'),
            'checked_time' => Yii::t('app', 'Checked Time'),
            'content_id' => Yii::t('app', 'Content ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
