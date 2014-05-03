<?php

namespace app\modules\administracion\controllers;

use Yii;
use app\models\Establecimiento;
use app\models\search\EstablecimientoSearch;
use app\models\search\SedeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstablecimientosController implements the CRUD actions for Establecimiento model.
 */
class EstablecimientosController extends Controller
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
     * Lists all Establecimiento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstablecimientoSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Establecimiento model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $sedesSearchModel = new SedeSearch;
        $params = Yii::$app->request->getQueryParams();
        $params['SedeSearch']['establecimiento_id'] = $id;
        $sedesDataProvider = $sedesSearchModel->search($params);

        return $this->render('view', [
            'sedesDataProvider' => $sedesDataProvider,
            'sedesSearchModel' => $sedesSearchModel,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Establecimiento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Establecimiento;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Establecimiento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Establecimiento model.
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
     * Finds the Establecimiento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Establecimiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Establecimiento::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
