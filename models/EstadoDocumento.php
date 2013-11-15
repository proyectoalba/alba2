<?php

namespace app\models;

/**
 * This is the model class for table "estado_documento".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $orden
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
	public function getPersonas()
	{
		return $this->hasMany(Persona::className(), ['estado_documento_id' => 'id']);
	}
}
