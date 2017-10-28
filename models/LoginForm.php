<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $user_login;
    public $user_pass;
    public $remember_me = true;

    private $_user = false;
    
    public function attributeLabels()
    {
        return [
            'user_login' => 'Login',
            'user_pass' => 'Password',
        ];
    }
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['user_login', 'user_pass'], 'required'],
            // rememberMe must be a boolean value
            ['remember_me', 'boolean'],
            // password is validated by validatePassword()
            'password' => ['user_pass', 'validatePassword'],
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
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->user_pass)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $this->updateKey();
            return Yii::$app->user->login($this->getUser(), $this->remember_me ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->user_login);
        }

        return $this->_user;
    }
    
    public function updateKey(){
        if ($this->_user === false) {
            $this->_user->auth_key = Yii::$app->security->generateRandomString();
            $this->_user->save();
        }
    }
}
