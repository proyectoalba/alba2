<?php

namespace app\models;

/**
 * This is the model class for table "docente".
 *
 * @property integer $id
 * @property integer $personas_id
 * @property string $codigo
 * @property string $fecha_alta
 * @property string $observaciones
 *
 * @property DesignacionDocente[] $designacionDocentes
 * @property Persona $personas
 * @property DocenteEstado[] $docenteEstados
 */
class Docente extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'docente';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id', 'personas_id', 'fecha_alta'], 'required'],
			[['id', 'personas_id'], 'integer'],
			[['fecha_alta'], 'safe'],
			[['codigo', 'observaciones'], 'string', 'max' => 45]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'personas_id' => 'Personas ID',
			'codigo' => 'Codigo',
			'fecha_alta' => 'Fecha Alta',
			'observaciones' => 'Observaciones',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDesignacionDocentes()
	{
		return $this->hasMany(DesignacionDocente::className(), ['docente_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPersonas()
	{
		return $this->hasOne(Persona::className(), ['id' => 'personas_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDocenteEstados()
	{
		return $this->hasMany(DocenteEstado::className(), ['docente_id' => 'id']);
	}
}
