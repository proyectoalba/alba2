<?php

namespace app\models;

/**
 * This is the model class for table "inscripcion_informacion_adicional".
 *
 * @property integer $id
 * @property integer $inscripcion_id
 * @property integer $cantidad_hermanos
 * @property integer $hermanos_en_establecimiento
 * @property string $distancia_establecimiento
 * @property integer $habitantes_hogar
 *
 * @property Inscripcion $inscripcion
 */
class InscripcionInformacionAdicional extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'inscripcion_informacion_adicional';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['inscripcion_id'], 'required'],
			[['inscripcion_id', 'cantidad_hermanos', 'hermanos_en_establecimiento', 'habitantes_hogar'], 'integer'],
			[['distancia_establecimiento'], 'string', 'max' => 45],
			[['inscripcion_id'], 'unique']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'inscripcion_id' => 'Inscripcion ID',
			'cantidad_hermanos' => 'Cantidad Hermanos',
			'hermanos_en_establecimiento' => 'Hermanos En Establecimiento',
			'distancia_establecimiento' => 'Distancia Establecimiento',
			'habitantes_hogar' => 'Habitantes Hogar',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getInscripcion()
	{
		return $this->hasOne(Inscripcion::className(), ['id' => 'inscripcion_id']);
	}
}
