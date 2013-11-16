<?php

namespace app\modules\setup\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}
}
