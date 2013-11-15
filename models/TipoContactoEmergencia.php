<?php

namespace app\models;

/**
 * This is the model class for table "tipo_contacto_emergencia".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $orden
 *
 * @property ContactoEmergencia[] $contactoEmergencias
 */
class TipoContactoEmergencia extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tipo_contacto_emergencia';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['descripcion', 'required'],
			['orden', 'integer'],
			['descripcion', 'string', 'max' => 45]
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
			'orden' => 'Orden',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getContactoEmergencias()
	{
		return $this->hasMany(ContactoEmergencia::className(), ['tipo_contacto_id' => 'id']);
	}
}
