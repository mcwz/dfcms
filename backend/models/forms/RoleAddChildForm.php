<?php
namespace backend\models\forms;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class RoleAddChildForm extends Model
{
    public $childItems;
    public $role;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['childItems', 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'childItems' => Yii::t('app', 'Module List to add'),
            'role' => Yii::t('app', 'Role'),
        ];
    }
}
