<?php

namespace app\models;

/**
 * This is the model class for table "estado_ciclo_lectivo".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property CicloLectivo[] $cicloLectivos
 * @property CicloLectivoEstado[] $cicloLectivoEstados
 */
class EstadoCicloLectivo extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'estado_ciclo_lectivo';
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
	public function getCicloLectivos()
	{
		return $this->hasMany(CicloLectivo::className(), ['estado_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getCicloLectivoEstados()
	{
		return $this->hasMany(CicloLectivoEstado::className(), ['estado_id' => 'id']);
	}
}
