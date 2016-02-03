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
    public $user;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['assignments', 'safe'],
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
            'user'=>Yii::t('app', 'User'),
        ];
    }
}
