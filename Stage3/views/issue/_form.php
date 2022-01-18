<?php

use app\models\Rent;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Issue */
/* @var $form yii\widgets\ActiveForm */
/* @var $car_id integer */
?>

<div class="issue-form">


    <?php
    $form = ActiveForm::begin();
    $model->setAttribute('client_id', Yii::$app->user->getId());

    $model->setAttribute('car_id', $_GET['car_id']);

    ?>

    <?= $form->field($model, 'explanation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client_id')->textInput(['readonly'=> true]) ?>

    <?= $form->field($model, 'car_id')->textInput(['readonly'=> true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
