<?php

namespace app\controllers;

class CarController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
