<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
use app\models\Pais;
use app\models\Provincia;
use app\models\Ciudad;

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
     * Obtener las provincias de un determinado País.
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
    /**
     * Obtener las ciudades de una determinada Provincia.
     * @param integer $provincia_id
     * 
     */ 
    public function actionCiudadesPorProvincia($provincia_id)
    {
        $q = Ciudad::find();
        if(intval($provincia_id) > 0){
            $q->where(['provincia_id' => $provincia_id]);
        }
        $items = ArrayHelper::map($q->orderBy('nombre ASC')->asArray()->all(), 'id', 'nombre');

        return \yii\helpers\Json::encode($items);
    }
}
