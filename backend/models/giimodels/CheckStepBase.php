<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "check_step".
 *
 * @property string $id
 * @property integer $step
 * @property string $group_id
 * @property integer $type
 * @property string $created_at
 */
class CheckStepBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'check_step';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['step', 'group_id', 'type', 'created_at'], 'required'],
            [['step', 'group_id', 'type', 'created_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'step' => Yii::t('app', 'Step'),
            'group_id' => Yii::t('app', 'Group ID'),
            'type' => Yii::t('app', 'Check Type'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
