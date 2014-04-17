<?php

namespace app\modules\administracion\controllers;

use yii\web\Controller;

class EstablecimientoController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}
}
