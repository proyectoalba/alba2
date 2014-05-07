<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\components\behaviors;

use Yii;
//use Closure;
use yii\base\Behavior;
use yii\base\Event;
use yii\db\BaseActiveRecord;
use yii\behaviors\AttributeBehavior;

/**
 * Behavior que guarda el registro en el historial de estados indicado.
 */ 
class RegistrarEstadoBehavior extends AttributeBehavior
{
    /**
     * @inheritdoc
     */ 
    public $attributes = [
        BaseActiveRecord::EVENT_AFTER_INSERT => 'estado_id',
        BaseActiveRecord::EVENT_AFTER_UPDATE => 'estado_id',
    ];
    /**
     * La clase que mantiene el historial de estados.
     * @param string estadoModel nombre de la clase que mantiene el historial de estados
     */ 
    public $estadoModel;
    /**
     * La columna que hace referencia en la tabla de estados a la clase actual.
     * @param string columnaReferencia nombre de la columna
     */ 
    public $columnaReferencia;

    /**
     * @inheritdoc
     */
    public function evaluateAttributes($event)
    {
        // Guardar cuando el registro es nuevo o el ultimo estado es diferente al nuevo
        $model = $this->owner;
        $hoy = date('Y-m-d H:i:s');

        $estadoActualId = $model->estado_id;
        $ultimoEstadoId = !empty($model->estados) ? array_pop($model->estados)->estado_id : null;

        if ($ultimoEstadoId === null || ($ultimoEstadoId != $estadoActualId)) {

            if (!empty($this->attributes[$event->name])) {
                $attributes = (array) $this->attributes[$event->name];

                foreach ($attributes as $attribute) {
                    $estadoModel = new $this->estadoModel;
                    $estadoModel->estado_id = $estadoActualId;
                    $estadoModel->{$this->columnaReferencia} = $model->id;
                    $estadoModel->fecha = $hoy;
                    $estadoModel->save();
                } // END foreach

            } // END if

        } // END if
    }
}
