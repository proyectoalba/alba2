<?php

namespace app\models;

/**
 * This is the model class for table "tipo_contacto_emergencia".
 *
 * @property integer $id
 * @property string $descripcion
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
			[['descripcion'], 'required'],
			[['descripcion'], 'string', 'max' => 45],
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
	public function getContactoEmergencias()
	{
		return $this->hasMany(ContactoEmergencia::className(), ['tipo_contacto_id' => 'id']);
	}
}
