<?php

namespace app\models;

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
			'id' => 'ID',
			'ciclo_lectivo_id' => 'Ciclo Lectivo ID',
			'tipo_periodo_id' => 'Tipo Periodo ID',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'orden' => 'Orden',
			'estado_id' => 'Estado ID',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getCicloLectivo()
	{
		return $this->hasOne(CicloLectivo::className(), ['id' => 'ciclo_lectivo_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTipoPeriodo()
	{
		return $this->hasOne(TipoPeriodoCicloLectivo::className(), ['id' => 'tipo_periodo_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEstado()
	{
		return $this->hasOne(EstadoPeriodoCicloLectivo::className(), ['id' => 'estado_id']);
	}
}
