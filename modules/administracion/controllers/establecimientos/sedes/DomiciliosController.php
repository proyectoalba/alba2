<?php

namespace app\modules\administracion\controllers\establecimientos\sedes;

use Yii;
use app\models\Sede;
use app\models\Domicilio;
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
     * @param integer $sede_id
     * @return mixed
     */
    public function actionIndex($establecimiento_id, $sede_id)
    {

        $sede = Sede::findOne(['establecimiento_id' => $establecimiento_id, 'id' => $sede_id]);
        die(var_export($sede->domicilios));
        $dom = Domicilio::findOne(1);
        die(var_export($dom->sede));
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
     * @param integer $sede_id
     * @return mixed
     */
    public function actionCreate($establecimiento_id, $sede_id)
    {
        $sede = Sede::findOne(['establecimiento_id' => $establecimiento_id, 'id' => $sede_id]);
        
        $model = new SedeDomicilio;
        $model->sede_id = $sede_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['establecimientos/' . $sede->establecimiento_id . '/sedes/' . $sede->id . '/domicilios/view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SedeDomicilio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($establecimiento_id, $sede_id, $id)
    {
        $model = $this->findModel($establecimiento_id, $sede_id, $id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['establecimientos/' . $sede->establecimiento_id . '/sedes/' . $sede->id . '/domicilios/view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SedeDomicilio model.
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
        $model = SedeDomicilio::find()
            ->joinWith('sede')
            ->where('sede_domicilio.id = :id AND sede_domicilio.sede_id = :sede_id AND sede.establecimiento_id = :establecimiento_id', [
                ':id' => $id, ':sede_id' => $sede_id, ':establecimiento_id' => $establecimiento_id, 
            ])->one();
        
        ;
        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
