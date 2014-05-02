<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
use app\models\Provincia;
use app\models\Pais;

class AjaxController extends Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'*' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Obtener las provincias de determinado país.
     * @param integer $pais_id
     * 
     */ 
    public function actionProvinciasPorPais($pais_id)
    {
        $q = Provincia::find();
        if(intval($pais_id) > 0){
            $q->where(['pais_id' => $pais_id]);
        }
        $items = ArrayHelper::map($q->orderBy('nombre ASC')->asArray()->all(), 'id', 'nombre');
        
        return \yii\helpers\Json::encode($items);
    }
}
