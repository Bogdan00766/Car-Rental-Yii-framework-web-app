<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rent-form">

    <?php $form = ActiveForm::begin();
    $model->setAttribute('client_id', Yii::$app->user->getId());
    $model->setAttribute('car_id', $_GET['car_id']);


    ?>

    <?= $form->field($model, 'rent_start')->textInput() ?>

    <?= $form->field($model, 'rent_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
