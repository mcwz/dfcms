<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "node_attr_group".
 *
 * @property string $id
 * @property string $node_id
 * @property string $attr_group_id
 * @property string $created_at
 */
class NodeAttrGroupBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'node_attr_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['node_id', 'attr_group_id', 'created_at'], 'required'],
            [['node_id', 'attr_group_id', 'created_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'node_id' => Yii::t('app', 'Node ID'),
            'attr_group_id' => Yii::t('app', 'Attr Group ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
