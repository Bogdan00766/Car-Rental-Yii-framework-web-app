<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rent */
/* @var $car_id int */

$this->title = 'Create Rent';
$this->params['breadcrumbs'][] = ['label' => 'Rents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    ?>
    <?= $this->render('_form', [
        'model' => $model,
        'car_id' => $car_id,
    ]) ?>

</div>
