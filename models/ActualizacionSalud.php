<?php

namespace app\models;

/**
 * This is the model class for table "actualizacion_salud".
 *
 * @property integer $id
 * @property integer $ficha_salud_id
 * @property string $observaciones
 * @property string $fecha
 *
 * @property FichaSalud $fichaSalud
 */
class ActualizacionSalud extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'actualizacion_salud';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['ficha_salud_id, observaciones, fecha', 'required'],
			['ficha_salud_id', 'integer'],
			['fecha', 'safe'],
			['observaciones', 'string', 'max' => 255]
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
			'observaciones' => 'Observaciones',
			'fecha' => 'Fecha',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getFichaSalud()
	{
		return $this->hasOne(FichaSalud::className(), ['id' => 'ficha_salud_id']);
	}
}
