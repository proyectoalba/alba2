<?php

namespace app\modules\administracion\controllers\establecimientos\sedes;

use Yii;
use app\models\Sede;
use app\models\Domicilio;
use app\models\SedeDomicilio;
use app\models\search\SedeDomicilioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DomiciliosController implements the CRUD actions for SedeDomicilio model.
 */
class DomiciliosController extends Controller
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
     * Lists all SedeDomicilio models.
     * @param integer $establecimiento_id
     * @param integer $sede_id
     * @return mixed
     */
    public function actionIndex($establecimiento_id, $sede_id)
    {
        $sede = Sede::findOne(['establecimiento_id' => $establecimiento_id, 'id' => $sede_id]);

        $searchModel = new SedeDomicilioSearch;
        $params = Yii::$app->request->getQueryParams();
        $params['SedeDomicilioSearch']['sede_id'] = $sede_id;
        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'sede' => $sede,
        ]);
    }

    /**
     * Displays a single SedeDomicilio model.
     * @param integer $establecimiento_id
     * @param integer $sede_id
     * @param integer $id
     * @return mixed
     */
    public function actionView($establecimiento_id, $sede_id, $id)
    {
        return $this->render('view', [
            'model' => $this->findModel($establecimiento_id, $sede_id, $id),
        ]);
    }

    /**
     * Creates a new SedeDomicilio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $establecimiento_id
     * @param integer $sede_id
     * @return mixed
     */
    public function actionCreate($establecimiento_id, $sede_id)
    {
        $sede = Sede::findOne(['establecimiento_id' => $establecimiento_id, 'id' => $sede_id]);
        
        $model = new Domicilio(['scenario' => 'sede']); // Para validar sólo lo referente a SedeDomicilio
        $model->sede = $sede;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['establecimientos/' . $sede->establecimiento_id . '/sedes/' . $sede->id . '/domicilios/view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'sede' => $sede,
            ]);
        }
    }

    /**
     * Updates an existing SedeDomicilio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $establecimiento_id
     * @param integer $sede_id
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($establecimiento_id, $sede_id, $id)
    {
        $model = $this->findModel($establecimiento_id, $sede_id, $id);
        $model->scenario = 'sede';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['establecimientos/' . $model->sede->establecimiento_id . '/sedes/' . $model->sede->id . '/domicilios/view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SedeDomicilio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $establecimiento_id
     * @param integer $sede_id
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($establecimiento_id, $sede_id, $id)
    {
        $model = $this->findModel($establecimiento_id, $sede_id, $id);
        $model->delete();

        return $this->redirect(['establecimientos/' . $model->sede->establecimiento_id . '/sedes/' . $model->sede->id . '/domicilios']);
    }

    /**
     * Finds the SedeDomicilio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $establecimiento_id
     * @param integer $sede_id
     * @param integer $id
     * @return SedeDomicilio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($establecimiento_id, $sede_id, $id)
    {
        $model = Domicilio::find()
            ->joinWith('sede')
            ->where(['sede.establecimiento_id' => $establecimiento_id, 'sede.id' => $sede_id, 'domicilio.id' => $id])
            ->one();

        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
