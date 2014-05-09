<?php

namespace app\modules\administracion\controllers\alumnos;

use Yii;
use app\models\Alumno;
use app\models\Domicilio;
use app\models\AlumnoDomicilio;
use app\models\search\AlumnoDomicilioSearch;
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
    public function actionIndex($alumno_id)
    {   
        $alumno = Alumno::findOne(['id' => $alumno_id]);

        $searchModel = new AlumnoDomicilioSearch;
        $params = Yii::$app->request->getQueryParams();
        $params['AlumnoDomicilioSearch']['alumno_id'] = $alumno_id;
        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'alumno' => $alumno,
        ]);
    }

    /**
     * Displays a single SedeDomicilio model.
     * @param integer $establecimiento_id
     * @param integer $sede_id
     * @param integer $id
     * @return mixed
     */
    public function actionView($alumno_id, $id)
    {
        return $this->render('view', [
            'model' => $this->findModel($alumno_id, $id),
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
    protected function findModel($alumno_id, $id)
    {
        $model = Domicilio::find()
            ->joinWith('alumno')
            ->where(['alumno.id' => $alumno_id, 'domicilio.id' => $id])
            ->one();

        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
