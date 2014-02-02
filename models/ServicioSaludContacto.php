<?php

namespace app\models;

/**
 * This is the model class for table "servicio_salud_contacto".
 *
 * @property integer $id
 * @property integer $servicio_salud_id
 * @property string $direccion
 * @property string $cp
 * @property integer $pais_id
 * @property integer $provincia_id
 * @property integer $ciudad_id
 * @property string $telefono
 * @property string $telefono_alternativo
 * @property integer $contacto_preferido
 * @property string $observaciones
 *
 * @property Ciudad $ciudad
 * @property Pais $pais
 * @property Provincia $provincia
 * @property ServicioSalud $servicioSalud
 */
class ServicioSaludContacto extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'servicio_salud_contacto';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['servicio_salud_id', 'direccion', 'telefono'], 'required'],
			[['servicio_salud_id', 'pais_id', 'provincia_id', 'ciudad_id', 'contacto_preferido'], 'integer'],
			[['direccion'], 'string', 'max' => 99],
			[['cp'], 'string', 'max' => 30],
			[['telefono', 'telefono_alternativo'], 'string', 'max' => 60],
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
			'servicio_salud_id' => 'Servicio Salud ID',
			'direccion' => 'Direccion',
			'cp' => 'Cp',
			'pais_id' => 'Pais ID',
			'provincia_id' => 'Provincia ID',
			'ciudad_id' => 'Ciudad ID',
			'telefono' => 'Telefono',
			'telefono_alternativo' => 'Telefono Alternativo',
			'contacto_preferido' => 'Contacto Preferido',
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
	public function getProvincia()
	{
		return $this->hasOne(Provincia::className(), ['id' => 'provincia_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getServicioSalud()
	{
		return $this->hasOne(ServicioSalud::className(), ['id' => 'servicio_salud_id']);
	}
}
