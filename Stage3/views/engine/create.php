<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Engine */

$this->title = 'Create Engine';
$this->params['breadcrumbs'][] = ['label' => 'Engines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="engine-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
