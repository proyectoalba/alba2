<?php

namespace app\models;

/**
 * This is the model class for table "estado_plan_estudio".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $nombre_interno
 *
 * @property PlanEstudio[] $planEstudios
 * @property PlanEstudioEstado[] $planEstudioEstados
 */
class EstadoPlanEstudio extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'estado_plan_estudio';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id', 'descripcion', 'nombre_interno'], 'required'],
			[['id'], 'integer'],
			[['descripcion'], 'string', 'max' => 99],
			[['nombre_interno'], 'string', 'max' => 45]
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
			'nombre_interno' => 'Nombre Interno',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPlanEstudios()
	{
		return $this->hasMany(PlanEstudio::className(), ['estado_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPlanEstudioEstados()
	{
		return $this->hasMany(PlanEstudioEstado::className(), ['estado_id' => 'id']);
	}
}
