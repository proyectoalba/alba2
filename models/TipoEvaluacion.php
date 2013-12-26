<?php

namespace app\models;

/**
 * This is the model class for table "tipo_evaluacion".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Evaluacion[] $evaluacions
 */
class TipoEvaluacion extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tipo_evaluacion';
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
	 * @return \yii\db\ActiveRelation
	 */
	public function getEvaluacions()
	{
		return $this->hasMany(Evaluacion::className(), ['tipo_evaluacion_id' => 'id']);
	}
}
