<?php

namespace app\models;

/**
 * This is the model class for table "ciudad".
 *
 * @property integer $id
 * @property integer $provincia_id
 * @property string $nombre
 *
 * @property Provincia $provincia
 * @property EstablecimientoProcedencia[] $establecimientoProcedencias
 * @property PersonaDomicilio[] $personaDomicilios
 * @property SedeDomicilio[] $sedeDomicilios
 * @property ServicioSaludContacto[] $servicioSaludContactos
 */
class Ciudad extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'ciudad';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['provincia_id', 'nombre'], 'required'],
			[['provincia_id'], 'integer'],
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
			'provincia_id' => 'Provincia ID',
			'nombre' => 'Nombre',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getProvincia()
	{
		return $this->hasOne(Provincia::className(), ['id' => 'provincia_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEstablecimientoProcedencias()
	{
		return $this->hasMany(EstablecimientoProcedencia::className(), ['ciudad_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPersonaDomicilios()
	{
		return $this->hasMany(PersonaDomicilio::className(), ['ciudad_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getSedeDomicilios()
	{
		return $this->hasMany(SedeDomicilio::className(), ['ciudad_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getServicioSaludContactos()
	{
		return $this->hasMany(ServicioSaludContacto::className(), ['ciudad_id' => 'id']);
	}
}
