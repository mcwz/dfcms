<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $pos
 * @property integer $type
 * @property string $attr_group_id
 * @property string $check_group_id
 * @property string $path
 * @property string $article_t_path
 * @property string $index_t_path
 * @property string $cover_t_path
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CategoryTreepaths[] $categoryTreepaths
 * @property CategoryTreepaths[] $categoryTreepaths0
 */
class CategoryBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'status', 'created_at', 'updated_at'], 'required'],
            [['pos', 'type', 'attr_group_id', 'check_group_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'path'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 250],
            [['article_t_path', 'index_t_path', 'cover_t_path'], 'string', 'max' => 255]
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
            'description' => Yii::t('app', 'Description'),
            'pos' => Yii::t('app', 'Pos'),
            'type' => Yii::t('app', 'Type'),
            'attr_group_id' => Yii::t('app', 'Attr Group ID'),
            'check_group_id' => Yii::t('app', 'Check Group ID'),
            'path' => Yii::t('app', 'Path'),
            'article_t_path' => Yii::t('app', 'Article T Path'),
            'index_t_path' => Yii::t('app', 'Index T Path'),
            'cover_t_path' => Yii::t('app', 'Cover T Path'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryTreepaths()
    {
        return $this->hasMany(CategoryTreepaths::className(), ['ancestor' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryTreepaths0()
    {
        return $this->hasMany(CategoryTreepaths::className(), ['descendant' => 'id']);
    }
}
