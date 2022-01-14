<?php

use app\models\Car;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rent */

$this->title = 'Rent no.' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rent-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Change rent time', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cancel rent', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want cancel/end your rent?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'client_id',
            'car_id',
            'rent_start',
            'rent_time',
        ],
    ]) ?>
    <p>
        <h2> Car attributes </h2>
    </p>

    <?= DetailView::widget([
        'model' => Car::find()->where(['id' => $model->car_id])->one(),
        'attributes' => [
            'brand',
            'model',
            'color',
            'seats',
            'VIN',
            'status',
        ],
    ]) ?>
</div>
