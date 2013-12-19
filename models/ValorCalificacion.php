<?php

namespace app\models;

/**
 * This is the model class for table "valor_calificacion".
 *
 * @property integer $id
 * @property integer $tipo_calificacion_id
 * @property string $descripcion
 * @property double $valor_numerico
 * @property integer $orden
 *
 * @property Calificacion[] $calificacions
 * @property TipoCalificacion $tipoCalificacion
 */
class ValorCalificacion extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'valor_calificacion';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['tipo_calificacion_id', 'descripcion', 'valor_numerico'], 'required'],
			[['tipo_calificacion_id', 'orden'], 'integer'],
			[['valor_numerico'], 'number'],
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
			'tipo_calificacion_id' => 'Tipo Calificacion ID',
			'descripcion' => 'Descripcion',
			'valor_numerico' => 'Valor Numerico',
			'orden' => 'Orden',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getCalificacions()
	{
		return $this->hasMany(Calificacion::className(), ['valor_calificacion_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTipoCalificacion()
	{
		return $this->hasOne(TipoCalificacion::className(), ['id' => 'tipo_calificacion_id']);
	}
}
