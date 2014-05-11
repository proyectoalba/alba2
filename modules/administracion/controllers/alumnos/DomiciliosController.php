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
     * Lists all Domicilio models.
     * @param integer $alumno_id
     * @return mixed
     */
    public function actionIndex($alumno_id)
    {   
        $alumno = Alumno::findOne(['id' => $alumno_id]);

        $searchModel = new AlumnoDomicilioSearch;
        $params = Yii::$app->request->getQueryParams();
        $params['DomicilioSearch']['alumno_id'] = $alumno_id;
        $dataProvider = $searchModel->search($params);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'alumno' => $alumno,
        ]);
    }

    /**
     * Displays a single Domicilio model.
     * @param integer $alumno_id
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
     * Creates a new Domicilio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $alumno_id
     * @return mixed
     */
    public function actionCreate($alumno_id)
    {
        $alumno = Alumno::findOne(['id' => $alumno_id]);
        
        $model = new Domicilio(['scenario' => 'alumno']); // Para validar sólo lo referente a Alumno
        $model->perfil = $alumno->perfil;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['alumnos/' . $alumno->id . '/domicilios/view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'alumno' => $alumno,
            ]);
        }
    }

    /**
     * Updates an existing Domicilio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $alumno_id
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($alumno_id, $id)
    {
        $model = $this->findModel($alumno_id, $id);
        $model->scenario = 'alumno';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['alumnos/' . $model->perfil->alumno->id . '/domicilios/view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Domicilio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $alumno_id
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($alumno_id, $id)
    {
        $model = $this->findModel($alumno_id, $id);
        $model->delete();

        return $this->redirect(['alumnos/' . $model->perfil->alumno->id . '/domicilios']);
    }

    /**
     * Finds the Domicilio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $alumno_id
     * @param integer $id
     * @return Domicilio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($alumno_id, $id)
    {
        $model = Domicilio::find()
            ->joinWith(['perfil', 'perfil.alumno'])
            ->where(['alumno.id' => $alumno_id, 'domicilio.id' => $id])
            ->one();

        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
