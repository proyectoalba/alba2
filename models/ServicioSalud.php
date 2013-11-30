<?php

namespace app\models;

/**
 * This is the model class for table "servicio_salud".
 *
 * @property integer $id
 * @property string $codigo
 * @property string $abreviatura
 * @property string $nombre
 * @property string $email
 * @property string $sitio_web
 *
 * @property FichaSalud[] $fichaSaluds
 * @property ServicioSaludContacto[] $servicioSaludContactos
 */
class ServicioSalud extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'servicio_salud';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['codigo', 'abreviatura', 'nombre'], 'required'],
			[['codigo', 'abreviatura'], 'string', 'max' => 30],
			[['nombre'], 'string', 'max' => 255],
			[['email', 'sitio_web'], 'string', 'max' => 99]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'codigo' => 'Codigo',
			'abreviatura' => 'Abreviatura',
			'nombre' => 'Nombre',
			'email' => 'Email',
			'sitio_web' => 'Sitio Web',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getFichaSaluds()
	{
		return $this->hasMany(FichaSalud::className(), ['servicio_salud_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getServicioSaludContactos()
	{
		return $this->hasMany(ServicioSaludContacto::className(), ['servicio_salud_id' => 'id']);
	}
}
