<?php

namespace app\models;

/**
 * This is the model class for table "plan_estudio".
 *
 * @property integer $id
 * @property integer $nivel_id
 * @property string $codigo
 * @property string $nombre_completo
 * @property string $nombre_corto
 * @property integer $duracion
 * @property integer $estado_id
 * @property integer $plan_estudio_origen_id
 * @property string $resoluciones
 * @property string $normativas
 *
 * @property AsignaturaPlanEstudio[] $asignaturaPlanEstudios
 * @property ConfiguracionPlanEstudio[] $configuracionPlanEstudios
 * @property Inscripcion[] $inscripcions
 * @property EstadoPlanEstudio $estado
 * @property Nivel $nivel
 * @property PlanEstudio $planEstudioOrigen
 * @property PlanEstudio[] $planEstudios
 * @property PlanEstudioAnio[] $planEstudioAnios
 * @property PlanEstudioEstado[] $planEstudioEstados
 * @property Seccion[] $seccions
 */
class PlanEstudio extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'plan_estudio';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['nivel_id', 'codigo', 'nombre_completo', 'nombre_corto', 'duracion', 'estado_id'], 'required'],
			[['nivel_id', 'duracion', 'estado_id', 'plan_estudio_origen_id'], 'integer'],
			[['codigo'], 'string', 'max' => 45],
			[['nombre_completo', 'resoluciones', 'normativas'], 'string', 'max' => 255],
			[['nombre_corto'], 'string', 'max' => 99],
			[['codigo'], 'unique']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'nivel_id' => 'Nivel ID',
			'codigo' => 'Codigo',
			'nombre_completo' => 'Nombre Completo',
			'nombre_corto' => 'Nombre Corto',
			'duracion' => 'Duracion',
			'estado_id' => 'Estado ID',
			'plan_estudio_origen_id' => 'Plan Estudio Origen ID',
			'resoluciones' => 'Resoluciones',
			'normativas' => 'Normativas',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getAsignaturaPlanEstudios()
	{
		return $this->hasMany(AsignaturaPlanEstudio::className(), ['plan_estudio_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getConfiguracionPlanEstudios()
	{
		return $this->hasMany(ConfiguracionPlanEstudio::className(), ['plan_estudio_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getInscripcions()
	{
		return $this->hasMany(Inscripcion::className(), ['plan_estudio_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEstado()
	{
		return $this->hasOne(EstadoPlanEstudio::className(), ['id' => 'estado_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getNivel()
	{
		return $this->hasOne(Nivel::className(), ['id' => 'nivel_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPlanEstudioOrigen()
	{
		return $this->hasOne(PlanEstudio::className(), ['id' => 'plan_estudio_origen_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPlanEstudios()
	{
		return $this->hasMany(PlanEstudio::className(), ['plan_estudio_origen_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPlanEstudioAnios()
	{
		return $this->hasMany(PlanEstudioAnio::className(), ['plan_estudio_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPlanEstudioEstados()
	{
		return $this->hasMany(PlanEstudioEstado::className(), ['plan_estudio_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getSeccions()
	{
		return $this->hasMany(Seccion::className(), ['plan_estudio_id' => 'id']);
	}
}
