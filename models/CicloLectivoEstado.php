<?php

namespace app\models;

/**
 * This is the model class for table "ciclo_lectivo_estado".
 *
 * @property integer $id
 * @property integer $ciclo_lectivo_id
 * @property integer $estado_id
 * @property string $fecha
 *
 * @property CicloLectivo $cicloLectivo
 * @property EstadoCicloLectivo $estado
 */
class CicloLectivoEstado extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'ciclo_lectivo_estado';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['ciclo_lectivo_id', 'estado_id'], 'required'],
			[['ciclo_lectivo_id', 'estado_id'], 'integer'],
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
			'ciclo_lectivo_id' => 'Ciclo Lectivo ID',
			'estado_id' => 'Estado ID',
			'fecha' => 'Fecha',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCicloLectivo()
	{
		return $this->hasOne(CicloLectivo::className(), ['id' => 'ciclo_lectivo_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getEstado()
	{
		return $this->hasOne(EstadoCicloLectivo::className(), ['id' => 'estado_id']);
	}
}
