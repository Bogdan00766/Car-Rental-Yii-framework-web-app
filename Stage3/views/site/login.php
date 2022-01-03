<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
?>
<div class="container">
    <div class="row">
        <div class="col login-col">
            <h1 class="login-header">Login</h1>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "<div class=>{label}{input}</div><div>{error}</div>",
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <div class="form-group">
                <div class="">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col register-col">
            <h1 class="register-header">Register</h1>
            <form>
                <div class="form-group">
                    <label for="registerInputEmail">Email address</label>
                    <input type="email" class="form-control" id="registerInputEmail">
                </div>

                <div class="form-group">
                    <label for="registerInputPassword">Password</label>
                    <input type="password" class="form-control" id="registerInputPassword">
                </div>

                <div class="form-group">
                    <label for="registerInputName">Name</label>
                    <input type="text" class="form-control" id="registerInputName">
                </div>

                <div class="form-group">
                    <label for="registerInputLastName">Last name</label>
                    <input type="text" class="form-control" id="registerInputLastName">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>