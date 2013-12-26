<?php

namespace app\models;

/**
 * This is the model class for table "estado_docente".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property DocenteEstado[] $docenteEstados
 */
class EstadoDocente extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'estado_docente';
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
	public function getDocenteEstados()
	{
		return $this->hasMany(DocenteEstado::className(), ['estado_id' => 'id']);
	}
}
