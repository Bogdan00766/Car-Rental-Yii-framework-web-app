<?php

use app\models\Engine;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = $model->brand . ' ' . $model->model;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="car-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(Yii::$app->user->can('admin')){?>
    <p>

        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php }?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'VIN',
            'brand',
            'model',
            'color',
            'seats',
            'status',
        ],
    ]) ?>
    <h2><br>Engine in this car</h2>
    <?= DetailView::widget([
        'model' => Engine::find()->where(['id' => $model->engine_id])->one(),
        'attributes' => [
            'id',
            'serial_number',
            'fuel',
            'power',
            'cylinders',
        ],
    ]) ?>

</div>
