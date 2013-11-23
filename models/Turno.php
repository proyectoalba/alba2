<?php

namespace app\models;

/**
 * This is the model class for table "turno".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Seccion[] $seccions
 */
class Turno extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'turno';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['descripcion'], 'required'],
			[['descripcion'], 'string', 'max' => 30]
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
	 * @return \yii\db\ActiveRelation
	 */
	public function getSeccions()
	{
		return $this->hasMany(Seccion::className(), ['turno_id' => 'id']);
	}
}
