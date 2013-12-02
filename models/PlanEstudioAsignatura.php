<?php

namespace app\models;

/**
 * This is the model class for table "plan_estudio_asignatura".
 *
 * @property integer $id
 * @property integer $plan_estudio_id
 * @property integer $asignatura_id
 * @property integer $anio_id
 * @property integer $carga_horaria_semanal
 *
 * @property DesignacionDocente[] $designacionDocentes
 * @property PlanEstudioAnio $anio
 * @property Asignatura $asignatura
 * @property PlanEstudio $planEstudio
 */
class PlanEstudioAsignatura extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'plan_estudio_asignatura';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id', 'plan_estudio_id', 'asignatura_id', 'anio_id'], 'required'],
			[['id', 'plan_estudio_id', 'asignatura_id', 'anio_id', 'carga_horaria_semanal'], 'integer']
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
	public function getDesignacionDocentes()
	{
		return $this->hasMany(DesignacionDocente::className(), ['plan_estudio_asignatura_id' => 'id']);
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
	public function getAsignatura()
	{
		return $this->hasOne(Asignatura::className(), ['id' => 'asignatura_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPlanEstudio()
	{
		return $this->hasOne(PlanEstudio::className(), ['id' => 'plan_estudio_id']);
	}
}
