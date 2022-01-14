<?php

use app\models\Engine;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Car */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-form">

    <?php
    $items = Engine::find()
        ->select(['id'])
        ->indexBy('id')
        ->column();
    $model->setAttribute('status', 1);
    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'VIN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seats')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model,'engine_id')->dropDownList($items) ?>
    <p> </p>
    <?= Html::a('Create new engine', ['/engine/create'], ['class'=>'btn btn-danger']) ?>
    <p> </p>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
