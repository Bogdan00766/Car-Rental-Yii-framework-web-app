<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Engine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="engine-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id')->textInput() ?>

    <?= $form->field($model, 'Serial_Number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fuel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Power')->textInput() ?>

    <?= $form->field($model, 'Cylinders')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
