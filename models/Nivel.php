<?php

namespace app\models;

/**
 * This is the model class for table "nivel".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property AreaAsignatura[] $areaAsignaturas
 * @property CicloLectivo[] $cicloLectivos
 * @property EstablecimientoProcedencia[] $establecimientoProcedencias
 * @property PlanEstudio[] $planEstudios
 * @property TipoPeriodo[] $tipoPeriodos
 */
class Nivel extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'nivel';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['descripcion'], 'string', 'max' => 20]
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
	 * @return \yii\db\ActiveRelation
	 */
	public function getAreaAsignaturas()
	{
		return $this->hasMany(AreaAsignatura::className(), ['nivel_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getCicloLectivos()
	{
		return $this->hasMany(CicloLectivo::className(), ['nivel_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEstablecimientoProcedencias()
	{
		return $this->hasMany(EstablecimientoProcedencia::className(), ['nivel_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPlanEstudios()
	{
		return $this->hasMany(PlanEstudio::className(), ['nivel_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTipoPeriodos()
	{
		return $this->hasMany(TipoPeriodo::className(), ['nivel_id' => 'id']);
	}
}
