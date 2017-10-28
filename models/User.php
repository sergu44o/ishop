<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
//    public $auth_key;
//    public $id;
//    public $user_login;
//    public $user_pass;
//    public $user_email;
//    public $user_activation_key;
//    public $remember_me;
    
    public function afterFind(){
        foreach ($this->oldAttributes as $attr => $val)
            $this->{strtolower($attr)} = $val;
//        if (!Yii::$app->user->identity){
//            $this->auth_key = Yii::$app->security->generateRandomString();
//            $this->save();
//        }
        
    }
    
    public static function tableName()
    {
        return '{{%users}}';
    }
    
    public function createUser($model){
        $this->user_login = $model->user_login;
        $this->user_email = $model->user_email;
        $this->user_pass = Yii::$app->security->generatePasswordHash($model->user_pass);
        $this->auth_key = Yii::$app->security->generateRandomString();
        $this->user_activation_key = Yii::$app->security->generateRandomString();
        $this->save();
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $login
     * @return static|null
     */
    public static function findByUsername($login)
    {
        return static::findOne(['user_login' => $login]);
    }
    
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->user_pass);
    }
    
}
