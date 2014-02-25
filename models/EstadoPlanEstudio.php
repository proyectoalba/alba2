<?php

namespace app\models;

/**
 * This is the model class for table "estado_plan_estudio".
 *
 * @property integer $id
 * @property string $descripcion
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
			[['descripcion'], 'required'],
			[['descripcion'], 'string', 'max' => 99],
			[['descripcion'], 'unique']
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
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getPlanEstudios()
	{
		return $this->hasMany(PlanEstudio::className(), ['estado_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getPlanEstudioEstados()
	{
		return $this->hasMany(PlanEstudioEstado::className(), ['estado_id' => 'id']);
	}
}
