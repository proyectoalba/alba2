<?php

namespace app\models;

/**
 * This is the model class for table "sexo".
 *
 * @property integer $id
 * @property string $abreviatura
 * @property string $descripcion
 *
 * @property Persona[] $personas
 */
class Sexo extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'sexo';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['abreviatura, descripcion', 'required'],
			['abreviatura', 'string', 'max' => 10],
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
			'abreviatura' => 'Abreviatura',
			'descripcion' => 'Descripcion',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPersonas()
	{
		return $this->hasMany(Persona::className(), ['sexo_id' => 'id']);
	}
}
