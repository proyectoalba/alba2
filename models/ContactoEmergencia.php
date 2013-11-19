<?php

namespace app\models;

/**
 * This is the model class for table "contacto_emergencia".
 *
 * @property integer $id
 * @property integer $ficha_salud_id
 * @property integer $tipos_contacto_id
 * @property string $nombre
 * @property string $domicilio
 * @property string $telefono
 *
 * @property FichaSalud $fichaSalud
 * @property TipoContactoEmergencia $tiposContacto
 */
class ContactoEmergencia extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'contacto_emergencia';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id', 'ficha_salud_id', 'tipos_contacto_id'], 'required'],
			[['id', 'ficha_salud_id', 'tipos_contacto_id'], 'integer'],
			[['nombre', 'telefono'], 'string', 'max' => 45],
			[['domicilio'], 'string', 'max' => 99]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'ficha_salud_id' => 'Ficha Salud ID',
			'tipos_contacto_id' => 'Tipos Contacto ID',
			'nombre' => 'Nombre',
			'domicilio' => 'Domicilio',
			'telefono' => 'Telefono',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getFichaSalud()
	{
		return $this->hasOne(FichaSalud::className(), ['id' => 'ficha_salud_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTiposContacto()
	{
		return $this->hasOne(TipoContactoEmergencia::className(), ['id' => 'tipos_contacto_id']);
	}
}
