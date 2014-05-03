<?php

namespace app\modules\configuracion\controllers\datos;

use yii\web\Controller;

class DefaultController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}
}
