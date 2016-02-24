<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "nodes".
 *
 * @property string $id
 * @property string $pid
 * @property string $name
 * @property string $description
 * @property string $pos
 * @property integer $type
 * @property string $attr_group_id
 * @property string $flow_group_id
 * @property string $path
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class NodesBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nodes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'name', 'description', 'attr_group_id', 'flow_group_id', 'path', 'status', 'created_at', 'updated_at'], 'required'],
            [['pid', 'pos', 'type', 'attr_group_id', 'flow_group_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'path'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 250]
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
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'pos' => Yii::t('app', 'Pos'),
            'type' => Yii::t('app', 'Type'),
            'attr_group_id' => Yii::t('app', 'Attr Group ID'),
            'flow_group_id' => Yii::t('app', 'Flow Group ID'),
            'path' => Yii::t('app', 'Path'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
