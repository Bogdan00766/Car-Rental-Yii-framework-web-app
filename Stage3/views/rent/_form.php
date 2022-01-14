<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rent */

/* @var $car_id app\models\Rent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rent-form">

    <?php $form = ActiveForm::begin();
    $model->setAttribute('client_id', Yii::$app->user->getId());
    $model->setAttribute('car_id', $car_id);
    ?>
    <?= $form->field($model, 'rent_start')->widget(\yii\jui\DatePicker::className(),
        [ 'dateFormat' => 'php:Y-m-d',
            'clientOptions' => [
                'changeYear' => false,
                'changeMonth' => true,
                'altFormat' => 'yy-mm-dd',
            ]],['placeholder' => 'yyyy/mm/dd'])
        ->textInput(['placeholder' => \Yii::t('app', 'mm/dd/yyyy')]) ;?>

    <?= $form->field($model, 'rent_time')->textInput() ?>
    <p>(days)</p>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
