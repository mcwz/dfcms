<?php
namespace backend\models\forms;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class UserAssignForm extends Model
{
    public $assignments;
    public $user_group_assign;
    public $user;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['assignments', 'safe'],
            ['user_group_assign','safe']
        ];
    }


    // public function fields()
    // {
    //     return [
    //         'assignments',
    //     ];
    // }
    public function attributeLabels()
    {
        return [
            'assignments' => Yii::t('app', 'User Assignments'),
            'user_group_assign' => Yii::t('app', 'User Group Assign'),
            'user'=>Yii::t('app', 'User'),
        ];
    }
}
