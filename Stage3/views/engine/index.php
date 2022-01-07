<?php

use app\models\Engine;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Search\EngineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Engines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="engine-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Engine', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Serial_Number',
            'Fuel',
            'Power',
            'Cylinders',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Engine $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Id' => $model->Id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
