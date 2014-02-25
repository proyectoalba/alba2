<?php

namespace app\models;

/**
 * This is the model class for table "estado_documento".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Persona[] $personas
 */
class EstadoDocumento extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'estado_documento';
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
	public function getPersonas()
	{
		return $this->hasMany(Persona::className(), ['estado_documento_id' => 'id']);
	}
}
