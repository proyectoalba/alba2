<?php

namespace app\models;

/**
 * This is the model class for table "estado_inscripcion".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Inscripcion[] $inscripcions
 * @property InscripcionEstado[] $inscripcionEstados
 */
class EstadoInscripcion extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'estado_inscripcion';
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
	public function getInscripcions()
	{
		return $this->hasMany(Inscripcion::className(), ['estado_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getInscripcionEstados()
	{
		return $this->hasMany(InscripcionEstado::className(), ['estado_id' => 'id']);
	}
}
