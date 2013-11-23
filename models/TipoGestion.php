<?php

namespace app\models;

/**
 * This is the model class for table "tipo_gestion".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Establecimiento[] $establecimientos
 */
class TipoGestion extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tipo_gestion';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id', 'descripcion'], 'required'],
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
	public function getEstablecimientos()
	{
		return $this->hasMany(Establecimiento::className(), ['tipo_gestion_id' => 'id']);
	}
}
