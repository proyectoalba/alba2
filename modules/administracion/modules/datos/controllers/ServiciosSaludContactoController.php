<?php

namespace app\modules\administracion\modules\datos\controllers;

use app\models\ServicioSaludContacto;
use app\models\search\ServicioSaludContactoSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\VerbFilter;

/**
 * ServiciosSaludContactoController implements the CRUD actions for ServicioSaludContacto model.
 */
class ServiciosSaludContactoController extends Controller
{
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
		];
	}

	/**
	 * Lists all ServicioSaludContacto models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new ServicioSaludContactoSearch;
		$dataProvider = $searchModel->search($_GET);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single ServicioSaludContacto model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new ServicioSaludContacto model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new ServicioSaludContacto;

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing ServicioSaludContacto model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing ServicioSaludContacto model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		return $this->redirect(['index']);
	}

	/**
	 * Finds the ServicioSaludContacto model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return ServicioSaludContacto the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = ServicioSaludContacto::find($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
