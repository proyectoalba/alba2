<?php

namespace app\models;

/**
 * This is the model class for table "evaluacion".
 *
 * @property integer $id
 * @property integer $tipo_evaluacion_id
 * @property integer $periodo_ciclo_lectivo_id
 * @property integer $seccion_id
 * @property integer $docente_id
 * @property integer $asignatura_plan_estudio_id
 * @property integer $promedia
 * @property string $fecha
 *
 * @property Calificacion[] $calificacions
 * @property TipoEvaluacion $tipoEvaluacion
 * @property PeriodoCicloLectivo $periodoCicloLectivo
 * @property Seccion $seccion
 * @property Docente $docente
 * @property AsignaturaPlanEstudio $asignaturaPlanEstudio
 */
class Evaluacion extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'evaluacion';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['tipo_evaluacion_id', 'periodo_ciclo_lectivo_id', 'seccion_id', 'docente_id', 'asignatura_plan_estudio_id', 'fecha'], 'required'],
			[['tipo_evaluacion_id', 'periodo_ciclo_lectivo_id', 'seccion_id', 'docente_id', 'asignatura_plan_estudio_id', 'promedia'], 'integer'],
			[['fecha'], 'safe']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'tipo_evaluacion_id' => 'Tipo Evaluacion ID',
			'periodo_ciclo_lectivo_id' => 'Periodo Ciclo Lectivo ID',
			'seccion_id' => 'Seccion ID',
			'docente_id' => 'Docente ID',
			'asignatura_plan_estudio_id' => 'Asignatura Plan Estudio ID',
			'promedia' => 'Promedia',
			'fecha' => 'Fecha',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCalificacions()
	{
		return $this->hasMany(Calificacion::className(), ['evaluacion_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTipoEvaluacion()
	{
		return $this->hasOne(TipoEvaluacion::className(), ['id' => 'tipo_evaluacion_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getPeriodoCicloLectivo()
	{
		return $this->hasOne(PeriodoCicloLectivo::className(), ['id' => 'periodo_ciclo_lectivo_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSeccion()
	{
		return $this->hasOne(Seccion::className(), ['id' => 'seccion_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getDocente()
	{
		return $this->hasOne(Docente::className(), ['id' => 'docente_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAsignaturaPlanEstudio()
	{
		return $this->hasOne(AsignaturaPlanEstudio::className(), ['id' => 'asignatura_plan_estudio_id']);
	}
}
