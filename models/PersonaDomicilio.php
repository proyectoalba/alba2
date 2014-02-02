<?php

namespace app\models;

/**
 * This is the model class for table "persona_domicilio".
 *
 * @property integer $id
 * @property integer $persona_id
 * @property string $direccion
 * @property string $cp
 * @property integer $pais_id
 * @property integer $provincia_id
 * @property integer $ciudad_id
 * @property integer $principal
 * @property string $observaciones
 *
 * @property Ciudad $ciudad
 * @property Pais $pais
 * @property Persona $persona
 * @property Provincia $provincia
 */
class PersonaDomicilio extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'persona_domicilio';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['persona_id', 'direccion'], 'required'],
			[['persona_id', 'pais_id', 'provincia_id', 'ciudad_id', 'principal'], 'integer'],
			[['direccion'], 'string', 'max' => 99],
			[['cp'], 'string', 'max' => 30],
			[['observaciones'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'persona_id' => 'Persona ID',
			'direccion' => 'Direccion',
			'cp' => 'Cp',
			'pais_id' => 'Pais ID',
			'provincia_id' => 'Provincia ID',
			'ciudad_id' => 'Ciudad ID',
			'principal' => 'Principal',
			'observaciones' => 'Observaciones',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getCiudad()
	{
		return $this->hasOne(Ciudad::className(), ['id' => 'ciudad_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPais()
	{
		return $this->hasOne(Pais::className(), ['id' => 'pais_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPersona()
	{
		return $this->hasOne(Persona::className(), ['id' => 'persona_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getProvincia()
	{
		return $this->hasOne(Provincia::className(), ['id' => 'provincia_id']);
	}
}
