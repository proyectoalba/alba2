<?php

namespace app\models;

/**
 * This is the model class for table "inscripcion_estado".
 *
 * @property integer $id
 * @property integer $inscripcion_id
 * @property integer $estado_id
 * @property string $fecha
 *
 * @property Inscripcion $inscripcion
 * @property EstadoInscripcion $estado
 */
class InscripcionEstado extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'inscripcion_estado';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['inscripcion_id', 'estado_id', 'fecha'], 'required'],
			[['inscripcion_id', 'estado_id'], 'integer'],
			[['fecha'], 'safe']
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
			'estado_id' => 'Estado ID',
			'fecha' => 'Fecha',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getInscripcion()
	{
		return $this->hasOne(Inscripcion::className(), ['id' => 'inscripcion_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEstado()
	{
		return $this->hasOne(EstadoInscripcion::className(), ['id' => 'estado_id']);
	}
}
