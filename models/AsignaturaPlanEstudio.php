<?php

namespace app\models;

/**
 * This is the model class for table "asignatura_plan_estudio".
 *
 * @property integer $id
 * @property integer $plan_estudio_id
 * @property integer $asignatura_id
 * @property integer $anio_id
 * @property integer $carga_horaria_semanal
 *
 * @property PlanEstudio $planEstudio
 * @property Asignatura $asignatura
 * @property PlanEstudioAnio $anio
 * @property DesignacionDocente[] $designacionDocentes
 * @property Evaluacion[] $evaluacions
 */
class AsignaturaPlanEstudio extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'asignatura_plan_estudio';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['plan_estudio_id', 'asignatura_id', 'anio_id'], 'required'],
			[['plan_estudio_id', 'asignatura_id', 'anio_id', 'carga_horaria_semanal'], 'integer']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'plan_estudio_id' => 'Plan Estudio ID',
			'asignatura_id' => 'Asignatura ID',
			'anio_id' => 'Anio ID',
			'carga_horaria_semanal' => 'Carga Horaria Semanal',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPlanEstudio()
	{
		return $this->hasOne(PlanEstudio::className(), ['id' => 'plan_estudio_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getAsignatura()
	{
		return $this->hasOne(Asignatura::className(), ['id' => 'asignatura_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getAnio()
	{
		return $this->hasOne(PlanEstudioAnio::className(), ['id' => 'anio_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDesignacionDocentes()
	{
		return $this->hasMany(DesignacionDocente::className(), ['asignatura_plan_estudio_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEvaluacions()
	{
		return $this->hasMany(Evaluacion::className(), ['asignatura_plan_estudio_id' => 'id']);
	}
}
