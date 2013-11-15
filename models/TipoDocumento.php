<?php

namespace app\models;

/**
 * This is the model class for table "tipo_documento".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $abreviatura
 *
 * @property Persona[] $personas
 */
class TipoDocumento extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tipo_documento';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['descripcion, abreviatura', 'required'],
			['descripcion', 'string', 'max' => 40],
			['abreviatura', 'string', 'max' => 10]
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
			'abreviatura' => 'Abreviatura',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPersonas()
	{
		return $this->hasMany(Persona::className(), ['tipo_documento_id' => 'id']);
	}
}
