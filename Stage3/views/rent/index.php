<?php

use app\models\Rent;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\RentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'Client_id',
                'attribute' => 'client_id',
                'visible' => Yii::$app->user->can('admin'),
            ],
            'car_id',
            'rent_start',
            'rent_time',
            ['class' => 'yii\grid\ActionColumn',

                'template'=>'{view} {update} {report}',
                'buttons'=>[
                    'report' => function ($url, $model) {
                        return Html::a('Report', $url, [
                            'title' => Yii::t('yii', 'report'),
                        ]);
                    }
                ],
            ],

            //[
            //    'class' => ActionColumn::className(),
            //    'urlCreator' => function ($action, Rent $model, $key, $index, $column) {
            //        return Url::toRoute([$action, 'id' => $model->id]);
            //     }
            //],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
