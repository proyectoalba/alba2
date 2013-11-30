<?php

namespace app\models;

/**
 * This is the model class for table "estado_periodo_ciclo_lectivo".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $nombre_interno
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
			[['id', 'descripcion', 'nombre_interno'], 'required'],
			[['id'], 'integer'],
			[['descripcion', 'nombre_interno'], 'string', 'max' => 45]
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
			'nombre_interno' => 'Nombre Interno',
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
