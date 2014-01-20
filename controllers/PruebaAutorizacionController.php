<?php

namespace app\controllers;

use Yii;
use yii\web\AccessControl;
use yii\web\Controller;
use yii\web\VerbFilter;

class PruebaAutorizacionController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => ['index', 'autenticado', 'anonimo', 'match-callback', 'deny-callback'],
				'rules' => [
					[
						'actions' => ['index'],
						'allow' => true,
					],
					[
						'actions' => ['autenticado'],
						'allow' => true,
						'roles' => ['@'],
					],
					[
						'actions' => ['anonimo'],
						'allow' => true,
						'roles' => ['?'],
					],
					[
						'actions' => ['match-callback'],
						'allow' => true,
						'matchCallback' => function ($rule, $action) {
							return date('Y-m-d') <= '2014-12-10';
						}
					],
					// TODO: denyCallback
				],
			],
		];
	}

	public function actionIndex()
	{
		echo "Ok! Todos pueden ver esta página.";
	}

	public function actionAutenticado()
	{
		echo "Ok! Estás autenticado.";
	}

	public function actionAnonimo()
	{
		echo "Ok! Sólo se puede ver sin estar logueado.";
	}

	public function actionMatchCallback()
	{
		echo "Ok! Match callback. Sólo se puede acceder a esta acción hasta el 10/12/2014.";
	}

	public function actionDenyCallback()
	{
		echo "Ok! Deny callback.";
	}
	function fooBar(){
		die(var_export('hola'));
	}
}
