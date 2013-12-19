<?php

namespace app\models;

/**
 * This is the model class for table "tipo_calificacion".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property ConfiguracionPlanEstudio[] $configuracionPlanEstudios
 * @property ValorCalificacion[] $valorCalificacions
 */
class TipoCalificacion extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tipo_calificacion';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['descripcion'], 'required'],
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
	public function getConfiguracionPlanEstudios()
	{
		return $this->hasMany(ConfiguracionPlanEstudio::className(), ['tipo_calificacion_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getValorCalificacions()
	{
		return $this->hasMany(ValorCalificacion::className(), ['tipo_calificacion_id' => 'id']);
	}
}
