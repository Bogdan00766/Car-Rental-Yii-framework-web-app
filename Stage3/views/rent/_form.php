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
    //$model->setAttribute('rent_start', );


    ?>

    <?= $form->field($model, 'rent_start')->textInput() ?>
    <?= $form->field($model, 'date_of_birth')->widget(\yii\jui\DatePicker::className(),
        [ 'dateFormat' => 'php:m/d/Y',
            'clientOptions' => [
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '-50:-12',
                'altFormat' => 'yy-mm-dd',
            ]],['placeholder' => 'mm/dd/yyyy'])
        ->textInput(['placeholder' => \Yii::t('app', 'mm/dd/yyyy')]) ;?>

    <?= $form->field($model, 'rent_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
