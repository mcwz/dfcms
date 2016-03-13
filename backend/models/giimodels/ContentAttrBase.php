<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "content_attr".
 *
 * @property string $content_id
 * @property string $content
 * @property string $attr
 */
class ContentAttrBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content_attr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_id', 'content', 'attr'], 'required'],
            [['content_id'], 'integer'],
            [['content', 'attr'], 'string'],
            [['content_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'content_id' => Yii::t('app', 'Content ID'),
            'content' => Yii::t('app', 'Content'),
            'attr' => Yii::t('app', 'Attr'),
        ];
    }
}
