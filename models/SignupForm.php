<?php


namespace app\models;

use Yii;

class SignupForm extends LoginForm
{
    public $user_email;
    public $confirm_pass;
    public $captcha;
    
    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $new_labels = [
            'user_email' => 'E-mail',
            'confirm_pass' => 'Confirm password',
            'captcha' => '',
        ];
        $labels = array_merge($labels, $new_labels);
        
        return $labels;
    }
    
    public function rules(){
        $rules = parent::rules();
        unset($rules['password']);
        $new_rules = [
            [['user_email','confirm_pass'], 'required'],
            [['user_login', 'user_email'], 'validateDuplication'],
            ['user_pass', 'compare', 'compareAttribute' => 'confirm_pass', 'message' => 'Passwords doesn\'t match'],
            ['captcha', 'captcha', 'message' => 'Incorrect captcha!'],
        ];
        $rules = array_merge($rules, $new_rules);
        
        return $rules;
    }
    
    public function validateDuplication($attribute, $params){
        if (!$this->hasErrors()) {
            $user = User::findOne([$attribute => $this->$attribute]);
        
            if ($user) {
                $this->addError($attribute, 'Allready used!');
            }
        }
    }
    
    public function signup(){
        if ($this->validate()){
            $user = new User();
            $user->user_login = $this->user_login;
            $user->user_email = $this->user_email;
            $user->user_pass = Yii::$app->security->generatePasswordHash($this->user_pass);
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->user_activation_key = Yii::$app->security->generateRandomString();
            $user->save();
            
            return true;
        }
        
        return false;
    }
    
}