<?php
/* @var $model app\models\LoginForm */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<div id="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="/">Home</a></li>
            <li>Authorization</li>
        </ul>
    </div>
    <!-- / container -->
</div><!-- / body -->

<div id="body">
    <div class="container">
        <div class="col-lg-4">
        <? $form = ActiveForm::begin(
            [
                'id' => 'login-form',
                'options' => ['class' => 'form-horizontal']
            ]
        )?>
        <?= $form->field($model, 'user_login') ?>
        <?= $form->field($model, 'user_pass')->passwordInput() ?>
        <?= $form->field($model, 'remember_me')->checkbox(['class' => 'checkbox']) ?>
        <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary']) ?>
        
        <? ActiveForm::end() ?>
        </div>
    </div>
    <!-- / container -->
</div><!-- / body -->