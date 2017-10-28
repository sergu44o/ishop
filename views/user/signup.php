<?php
/* @var $model app\models\SignupForm */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Sign UP';
?>

<div id="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="/">Home</a></li>
            <li>Registration</li>
        </ul>
    </div>
    <!-- / container -->
</div><!-- / body -->

<div id="body">
    <div class="container">
        <div class="col-lg-4">
        <?
        $captcha = \yii\captcha\Captcha::className();
        
        $form = ActiveForm::begin(
            [
                'id' => 'login-form',
                'options' => ['class' => 'form-horizontal']
            ]
        )?>
        <?= $form->field($model, 'user_login') ?>
        <?= $form->field($model, 'user_email')->input('email') ?>
        <?= $form->field($model, 'user_pass')->passwordInput() ?>
        <?= $form->field($model, 'confirm_pass')->passwordInput() ?>
        <?= $form->field($model, 'remember_me')->checkbox(['class' => 'checkbox']) ?>
        <?= $form->field($model, 'captcha')->widget($captcha) ?>
        <?= Html::submitButton('Sign Up!', ['class' => 'btn btn-primary']) ?>
        
        <? ActiveForm::end() ?>
        </div>
    </div>
    <!-- / container -->
</div><!-- / body -->