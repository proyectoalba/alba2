<?php

namespace app\models;

/**
 * This is the model class for table "plan_estudio_anio".
 *
 * @property integer $id
 * @property integer $plan_estudio_id
 * @property string $descripcion
 * @property integer $orden
 *
 * @property AsignaturaPlanEstudio[] $asignaturaPlanEstudios
 * @property Inscripcion[] $inscripcions
 * @property PlanEstudio $planEstudio
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
			[['plan_estudio_id', 'descripcion', 'orden'], 'required'],
			[['plan_estudio_id', 'orden'], 'integer'],
			[['descripcion'], 'string', 'max' => 30]
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
			'descripcion' => 'Descripcion',
			'orden' => 'Orden',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getAsignaturaPlanEstudios()
	{
		return $this->hasMany(AsignaturaPlanEstudio::className(), ['anio_id' => 'id']);
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
	public function getPlanEstudio()
	{
		return $this->hasOne(PlanEstudio::className(), ['id' => 'plan_estudio_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getSeccions()
	{
		return $this->hasMany(Seccion::className(), ['anio_id' => 'id']);
	}
}
