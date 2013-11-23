<?php

namespace app\models;

/**
 * This is the model class for table "provincia".
 *
 * @property integer $id
 * @property integer $pais_id
 * @property string $nombre
 *
 * @property Ciudad[] $ciudads
 * @property PersonaDomicilio[] $personaDomicilios
 * @property Pais $pais
 * @property SedeDomicilio[] $sedeDomicilios
 * @property ServicioSaludContacto[] $servicioSaludContactos
 */
class Provincia extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'provincia';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['pais_id', 'nombre'], 'required'],
			[['pais_id'], 'integer'],
			[['nombre'], 'string', 'max' => 60]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'pais_id' => 'Pais ID',
			'nombre' => 'Nombre',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getCiudads()
	{
		return $this->hasMany(Ciudad::className(), ['provincia_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPersonaDomicilios()
	{
		return $this->hasMany(PersonaDomicilio::className(), ['provincia_id' => 'id']);
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
	public function getSedeDomicilios()
	{
		return $this->hasMany(SedeDomicilio::className(), ['provincia_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getServicioSaludContactos()
	{
		return $this->hasMany(ServicioSaludContacto::className(), ['provincia_id' => 'id']);
	}
}
