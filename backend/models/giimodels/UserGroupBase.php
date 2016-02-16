<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "user_group".
 *
 * @property string $id
 * @property string $pid
 * @property string $path
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property integer $pos
 * @property integer $status
 */
class UserGroupBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'path', 'name', 'description', 'created_at', 'updated_at', 'pos', 'status'], 'required'],
            [['pid', 'created_at', 'updated_at', 'pos', 'status'], 'integer'],
            [['path'], 'string', 'max' => 250],
            [['name', 'description'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pid' => Yii::t('app', 'Pid'),
            'path' => Yii::t('app', 'Path'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'pos' => Yii::t('app', 'Pos'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
