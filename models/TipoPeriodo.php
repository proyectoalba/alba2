<?php

namespace app\models;

/**
 * This is the model class for table "tipo_periodo".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $periodos_por_ciclo
 * @property integer $nivel_id
 *
 * @property PeriodoCicloLectivo[] $periodoCicloLectivos
 * @property Nivel $nivel
 */
class TipoPeriodo extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tipo_periodo';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['descripcion, periodos_por_ciclo, nivel_id', 'required'],
			['periodos_por_ciclo, nivel_id', 'integer'],
			['descripcion', 'string', 'max' => 45]
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
			'periodos_por_ciclo' => 'Periodos Por Ciclo',
			'nivel_id' => 'Nivel ID',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPeriodoCicloLectivos()
	{
		return $this->hasMany(PeriodoCicloLectivo::className(), ['tipo_periodo_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getNivel()
	{
		return $this->hasOne(Nivel::className(), ['id' => 'nivel_id']);
	}
}
