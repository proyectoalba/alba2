<?php

namespace app\modules\administracion\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\search\AlumnoSearch;
use app\models\Perfil;
use app\models\Alumno;
use app\models\EstadoAlumno;

/**
 * AlumnosController implements the CRUD actions for Alumno model.
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
     * Lists all Alumno models.
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
     * Displays a single Alumno model.
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
     * Creates a new Alumno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $hoy = date('Y-m-d H:i:s');
        
        $perfil = new Perfil;
        $perfil->fecha_alta = $hoy;
        
        $alumno = new Alumno;
        $alumno->estado_id = EstadoAlumno::findOne(['descripcion' => EstadoAlumno::PREINSCRIPTO])->id;

        // Ver http://www.yiiframework.com/forum/index.php/topic/53935-subforms/page__gopid__248185#entry248185
        if ($perfil->load(Yii::$app->request->post()) && Model::validateMultiple([$perfil, $alumno])) {
            
            $perfil->save(false);
            $alumno->perfil_id = $perfil->id;
            $alumno->save(false);
            
            return $this->redirect(['view', 'id' => $alumno->id]);
        } else {
            return $this->render('create', [
                'model' => $alumno,
                'perfil' => $perfil,
            ]);
        }
    }

    /**
     * Updates an existing Alumno model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->perfil->load(Yii::$app->request->post()) && $model->perfil->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Alumno model.
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
     * Finds the Alumno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Alumno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Alumno::find(['alumno.id' => $id])->innerJoinWith('perfil')->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
