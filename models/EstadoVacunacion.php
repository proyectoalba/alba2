<?php

namespace app\models;

/**
 * This is the model class for table "estado_vacunacion".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property FichaSalud[] $fichaSaluds
 */
class EstadoVacunacion extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'estado_vacunacion';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id'], 'required'],
			[['id'], 'integer'],
			[['descripcion'], 'string', 'max' => 45]
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
	public function getFichaSaluds()
	{
		return $this->hasMany(FichaSalud::className(), ['estado_vacunacion_id' => 'id']);
	}
}
