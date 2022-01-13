<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = 'Update Car: ' . $model->VIN;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->VIN, 'url' => ['view', 'VIN' => $model->VIN]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
