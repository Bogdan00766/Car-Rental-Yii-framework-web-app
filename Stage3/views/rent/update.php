<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rent */

$this->title = 'Update Rent: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'car_id' => $model->car_id,
    ]) ?>

</div>
