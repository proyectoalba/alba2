<?php

namespace app\models;

/**
 * This is the model class for table "tipo_inasistencia".
 *
 * @property integer $id
 * @property string $descripcion
 * @property double $maximas_permitidas
 *
 * @property ConfiguracionPlanEstudio[] $configuracionPlanEstudios
 * @property ValorInasistencia[] $valorInasistencias
 */
class TipoInasistencia extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tipo_inasistencia';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['descripcion'], 'required'],
			[['maximas_permitidas'], 'number'],
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
			'maximas_permitidas' => 'Maximas Permitidas',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getConfiguracionPlanEstudios()
	{
		return $this->hasMany(ConfiguracionPlanEstudio::className(), ['tipo_inasistencia_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getValorInasistencias()
	{
		return $this->hasMany(ValorInasistencia::className(), ['tipo_inasistencia_id' => 'id']);
	}
}
