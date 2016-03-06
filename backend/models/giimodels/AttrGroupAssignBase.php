<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "attr_group_assign".
 *
 * @property string $id
 * @property string $attr_id
 * @property string $group_id
 * @property string $created_at
 */
class AttrGroupAssignBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attr_group_assign';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attr_id', 'group_id', 'created_at'], 'required'],
            [['attr_id', 'group_id', 'created_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'attr_id' => Yii::t('app', 'Attr ID'),
            'group_id' => Yii::t('app', 'Group ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
