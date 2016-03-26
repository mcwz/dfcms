<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "check_step_user".
 *
 * @property string $id
 * @property string $step_id
 * @property string $user_id
 * @property string $created_at
 */
class CheckStepUserBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'check_step_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['step_id', 'user_id', 'created_at'], 'required'],
            [['step_id', 'user_id', 'created_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'step_id' => Yii::t('app', 'Step ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
