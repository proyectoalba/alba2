<?php

namespace app\modules\administracion\modules\datos\controllers;

use app\models\ServicioSalud;
use app\models\search\ServicioSaludSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\VerbFilter;

/**
 * ServiciosSaludController implements the CRUD actions for ServicioSalud model.
 */
class ServiciosSaludController extends Controller
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
	 * Lists all ServicioSalud models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new ServicioSaludSearch;
		$dataProvider = $searchModel->search($_GET);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single ServicioSalud model.
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
	 * Creates a new ServicioSalud model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new ServicioSalud;

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing ServicioSalud model.
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
	 * Deletes an existing ServicioSalud model.
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
	 * Finds the ServicioSalud model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return ServicioSalud the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = ServicioSalud::find($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
