<?php

use app\models\Rent;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Issue */
/* @var $rentModel app\models\Rent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issue-form">

    <?php
    $rentModel = Rent::find()->where('Client_Id' === Yii::$app->user->id)->all();
    if($rentModel || Yii::$app->user->can('admin')){
        if(Yii::$app->user->can('admin')) {
            $rentModel = Rent::find()->all();
        }
    $form = ActiveForm::begin();

    ?>

    <?= $form->field($model, 'Explanation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Car_VIN')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'Rent_Id')->dropDownList($rentModel)?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php
    }
    else echo '<h3>You have no rents</h3>'
?>
</div>
