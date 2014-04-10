<?php

namespace app\controllers;

class FrontendController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
