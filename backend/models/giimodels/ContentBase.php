<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $editor_id
 * @property string $editor_name
 * @property integer $node_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 */
class ContentBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'editor_id', 'editor_name', 'node_id', 'created_at', 'updated_at', 'status'], 'required'],
            [['editor_id', 'node_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['title'], 'string', 'max' => 250],
            [['description'], 'string', 'max' => 1000],
            [['editor_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'editor_id' => Yii::t('app', 'Editor ID'),
            'editor_name' => Yii::t('app', 'Editor Name'),
            'node_id' => Yii::t('app', 'Node ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
