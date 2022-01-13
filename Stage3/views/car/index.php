<?php

use app\models\Car;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
    <?php if(Yii::$app->user->can('admin')) {
        ?>
        <?= Html::a('Add Car', ['create'], ['class' => 'btn btn-success']) ?>

    <?php } ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    if(Yii::$app->user->can('Client')) {
        $searchModel->setAttribute('status', 0);
    }
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'VIN',
            'id',
            'brand',
            'model',
            'color',
            'seats',
            [
                'label' => 'Status',
                'attribute' => 'status',
                'visible' => Yii::$app->user->can('admin'),
            ],
            //'engine_id',
            ['class' => 'yii\grid\ActionColumn',

                'template'=>'{view} {rent}',
                'visible' => Yii::$app->user->can('client'),
                'buttons'=>[
                    'rent' => function ($url, $model) {
                        return Html::a('Rent', $url, [
                            'title' => Yii::t('yii', 'Download'),
                        ]);
                    }
                ],
            ],
            [
                'class' => ActionColumn::className(),
                'visible' => Yii::$app->user->can('admin'),
                'urlCreator' => function ($action, Car $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },

            ],

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
