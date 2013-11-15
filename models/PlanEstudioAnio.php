<?php

namespace app\models;

/**
 * This is the model class for table "plan_estudio_anio".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $plan_estudio_id
 * @property integer $orden
 *
 * @property Inscripcion[] $inscripcions
 * @property PlanEstudioAsignatura[] $planEstudioAsignaturas
 * @property Seccion[] $seccions
 */
class PlanEstudioAnio extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'plan_estudio_anio';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['descripcion, plan_estudio_id, orden', 'required'],
			['plan_estudio_id, orden', 'integer'],
			['descripcion', 'string', 'max' => 30]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'descripcion' => 'Descripcion',
			'plan_estudio_id' => 'Plan Estudio ID',
			'orden' => 'Orden',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getInscripcions()
	{
		return $this->hasMany(Inscripcion::className(), ['anio_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPlanEstudioAsignaturas()
	{
		return $this->hasMany(PlanEstudioAsignatura::className(), ['anio_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getSeccions()
	{
		return $this->hasMany(Seccion::className(), ['anio_id' => 'id']);
	}
}
