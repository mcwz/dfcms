<?php

namespace backend\models\giimodels;

use Yii;

/**
 * This is the model class for table "url".
 *
 * @property integer $id
 * @property string $relate_id
 * @property string $url
 * @property string $url_hash
 * @property integer $url_type
 * @property string $created_at
 */
class UrlBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['relate_id', 'url', 'url_hash', 'url_type', 'created_at'], 'required'],
            [['relate_id', 'url_type', 'created_at'], 'integer'],
            [['url'], 'string', 'max' => 255],
            [['url_hash'], 'string', 'max' => 32],
            [['url_hash'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'relate_id' => Yii::t('app', 'Relate ID'),
            'url' => Yii::t('app', 'Url'),
            'url_hash' => Yii::t('app', 'Url Hash'),
            'url_type' => Yii::t('app', '1,article;2,index;3,cover'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
