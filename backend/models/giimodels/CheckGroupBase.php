<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "check_group".
 *
 * @property string $id
 * @property string $name
 * @property integer $step_count
 * @property string $created_at
 * @property string $updated_at
 */
class CheckGroupBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'check_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['step_count', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'step_count' => Yii::t('app', 'Step Count'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
