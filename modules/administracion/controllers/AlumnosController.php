<?php

namespace app\modules\administracion\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\search\AlumnoSearch;
use app\models\Persona;
use app\models\Alumno;
use app\models\EstadoAlumno;

/**
 * AlumnosController implements the CRUD actions for Persona model.
 */
class AlumnosController extends Controller
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
     * Lists all Persona models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlumnoSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Persona model.
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
     * Creates a new Persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // Ver http://www.yiiframework.com/forum/index.php/topic/53935-subforms/page__gopid__248185#entry248185
    public function actionCreate()
    {
        $hoy = date('Y-m-d H:i:s');
        
        $persona = new Persona;
        $persona->fecha_alta = $hoy;
        
        $alumno = new Alumno;
        $alumno->fecha_alta = $hoy;
        $alumno->estado_id = EstadoAlumno::findOne(['descripcion' => 'Preinscripto'])->id; // Pasar a constantes en la clase EstadoAlumno

        //if ($persona->load(Yii::$app->request->post()) && $persona->save()) {
        if ($persona->load(Yii::$app->request->post()) && Model::validateMultiple([$persona, $alumno])) {
            
            $persona->save(false);
            $alumno->persona_id = $persona->id;
            $alumno->save(false);
            
            return $this->redirect(['view', 'id' => $persona->id]);
        } else {
            return $this->render('create', [
                'model' => $persona,
            ]);
        }
    }

    /**
     * Updates an existing Persona model.
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
     * Deletes an existing Persona model.
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
     * Finds the Persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Persona::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
