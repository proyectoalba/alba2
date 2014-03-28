<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periodo_ciclo_lectivo".
 *
 * @property integer $id
 * @property integer $ciclo_lectivo_id
 * @property integer $tipo_periodo_id
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $orden
 * @property integer $estado_id
 *
 * @property Evaluacion[] $evaluacions
 * @property CicloLectivo $cicloLectivo
 * @property TipoPeriodoCicloLectivo $tipoPeriodo
 * @property EstadoPeriodoCicloLectivo $estado
 */
class PeriodoCicloLectivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodo_ciclo_lectivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ciclo_lectivo_id', 'tipo_periodo_id', 'orden', 'estado_id'], 'required'],
            [['ciclo_lectivo_id', 'tipo_periodo_id', 'orden', 'estado_id'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ciclo_lectivo_id' => Yii::t('app', 'Ciclo Lectivo ID'),
            'tipo_periodo_id' => Yii::t('app', 'Tipo Periodo ID'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'orden' => Yii::t('app', 'Orden'),
            'estado_id' => Yii::t('app', 'Estado ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::className(), ['periodo_ciclo_lectivo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCicloLectivo()
    {
        return $this->hasOne(CicloLectivo::className(), ['id' => 'ciclo_lectivo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoPeriodo()
    {
        return $this->hasOne(TipoPeriodoCicloLectivo::className(), ['id' => 'tipo_periodo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(EstadoPeriodoCicloLectivo::className(), ['id' => 'estado_id']);
    }
}
