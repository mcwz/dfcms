<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "attrs".
 *
 * @property integer $id
 * @property string $name
 * @property string $label
 * @property integer $type
 * @property string $created_at
 * @property string $updated_at
 */
class AttrsBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attrs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'label', 'type', 'created_at', 'updated_at'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['label'], 'string', 'max' => 500]
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
            'label' => Yii::t('app', 'Label'),
            'type' => Yii::t('app', 'Type'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
