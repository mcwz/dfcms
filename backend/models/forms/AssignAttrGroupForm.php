<?php
namespace backend\models\forms;

use Yii;
use yii\base\Model;


class AssignAttrGroupForm extends Model
{
    public $attrsId;
    public $groupId;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['groupId', 'required'],
            ['attrsId', 'safe'],
            ['groupId', 'number'],
            ['attrsId', 'attrsIdIsNumArray'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attrsId' => Yii::t('app', 'Attrs ID'),
            'groupId' => Yii::t('app', 'Attr Group ID'),
        ];
    }

    /**
     * @return bool
     */
    public function attrsIdIsNumArray()
    {
        foreach($this->attrsId as $attrId)
        {
            if(!is_numeric($attrId))
            {
                return false;
            }
        }
        return true;
    }
}
