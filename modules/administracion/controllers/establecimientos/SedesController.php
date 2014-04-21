<?php

namespace app\modules\administracion\controllers\establecimientos;

use Yii;
use app\models\Sede;
use app\models\Establecimiento;
use app\models\search\SedeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SedesController implements the CRUD actions for Sede model.
 */
class SedesController extends Controller
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
     * Lists all Sede models.
     * @param integer $establecimiento_id
     * @return mixed
     */
    public function actionIndex($establecimiento_id)
    {
        $establecimiento = Establecimiento::findOne($establecimiento_id);

        $searchModel = new SedeSearch;
        $params = Yii::$app->request->getQueryParams();
        $params['SedeSearch']['establecimiento_id'] = $establecimiento_id;
        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'establecimiento' => $establecimiento,
        ]);
    }

    /**
     * Displays a single Sede model.
     * @param integer $establecimiento_id
     * @param integer $id
     * @return mixed
     */
    public function actionView($establecimiento_id, $id)
    {
        return $this->render('view', [
            'model' => $this->findModel($establecimiento_id, $id),
        ]);
    }

    /**
     * Creates a new Sede model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $establecimiento_id
     * @return mixed
     */
    public function actionCreate($establecimiento_id)
    {
        $establecimiento = Establecimiento::findOne($establecimiento_id);
        
        $model = new Sede;
        $model->establecimiento_id = $establecimiento_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['establecimientos/' . $establecimiento->id . '/sedes/view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'establecimiento' => $establecimiento,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sede model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $establecimiento_id
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($establecimiento_id, $id)
    {
        $model = $this->findModel($establecimiento_id, $id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['establecimientos/' . $model->establecimiento_id . '/sedes/view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sede model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $establecimiento_id
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($establecimiento_id, $id)
    {

        $this->findModel($establecimiento_id, $id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sede model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $establecimiento_id
     * @return Sede the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($establecimiento_id, $id)
    {
        if (($model = Sede::findOne(['establecimiento_id' => $establecimiento_id, 'id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
