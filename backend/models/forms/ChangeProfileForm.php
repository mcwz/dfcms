<?php
namespace backend\models\forms;

use Yii;
use yii\base\Model;
use backend\models\User;


/**
 * Login form
 */
class ChangeProfileForm extends Model
{
    public $password;
    public $newPassword;
    public $confirmPassword;
    public $email;

    private $_user;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            // when newPassword is not blank password is validated by validatePassword()
            ['password', 'validatePassword', 'when' => function($model) {
                return $model->password !== '';
            }],
            [['confirmPassword','newPassword'], 'checkPassword', 'when' => function($model) {
                $needCheck=($model->newPassword != '' || $model->confirmPassword!='');
                return $needCheck;
            }],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'newPassword'=>Yii::t('app', 'NewPassword'),
            'confirmPassword'=>Yii::t('app', 'ConfirmPassword'),
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app', 'Incorrect password.'));
            }
    }


    /**
     * check the newPassword and confirmPassword is match.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function checkPassword($attribute, $params)
    {

        if($this->password==null)
        {
            $this->addError('password', Yii::t('app', 'Please Insert old password.'));
        }
        if(strlen($this->newPassword)<6)
        {
            $this->addError('newPassword', Yii::t('app', 'The newPassword should be more than 6 letters.'));
        }
        if ($this->newPassword !== $this->confirmPassword)
        {
                $this->addError($attribute, Yii::t('app', 'newPassword and confirmPassword is not match.'));
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername(Yii::$app->user->identity->username);
        }

        return $this->_user;
    }


}
