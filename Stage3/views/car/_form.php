<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Car */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'VIN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Seats')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Engine_Id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
