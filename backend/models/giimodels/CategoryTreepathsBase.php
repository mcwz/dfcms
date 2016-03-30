<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "category_treepaths".
 *
 * @property string $ancestor
 * @property string $descendant
 *
 * @property Category $ancestor0
 * @property Category $descendant0
 */
class CategoryTreepathsBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_treepaths';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ancestor', 'descendant'], 'required'],
            [['ancestor', 'descendant'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ancestor' => Yii::t('app', 'Ancestor'),
            'descendant' => Yii::t('app', 'Descendant'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAncestor0()
    {
        return $this->hasOne(Category::className(), ['id' => 'ancestor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescendant0()
    {
        return $this->hasOne(Category::className(), ['id' => 'descendant']);
    }
}
