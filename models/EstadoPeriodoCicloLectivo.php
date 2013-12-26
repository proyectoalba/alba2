<?php

namespace app\models;

/**
 * This is the model class for table "estado_periodo_ciclo_lectivo".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property PeriodoCicloLectivo[] $periodoCicloLectivos
 */
class EstadoPeriodoCicloLectivo extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'estado_periodo_ciclo_lectivo';
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
	public function getPeriodoCicloLectivos()
	{
		return $this->hasMany(PeriodoCicloLectivo::className(), ['estado_id' => 'id']);
	}
}
