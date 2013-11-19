<?php

namespace app\models;

/**
 * This is the model class for table "docente_estado".
 *
 * @property integer $id
 * @property integer $estado_id
 * @property integer $docente_id
 * @property string $fecha
 *
 * @property EstadoDocente $estado
 * @property Docente $docente
 */
class DocenteEstado extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'docente_estado';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id', 'estado_id', 'docente_id'], 'required'],
			[['id', 'estado_id', 'docente_id'], 'integer'],
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
			'estado_id' => 'Estado ID',
			'docente_id' => 'Docente ID',
			'fecha' => 'Fecha',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEstado()
	{
		return $this->hasOne(EstadoDocente::className(), ['id' => 'estado_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDocente()
	{
		return $this->hasOne(Docente::className(), ['id' => 'docente_id']);
	}
}
