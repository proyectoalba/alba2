<?php

namespace app\models;

/**
 * This is the model class for table "estado_docente".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $nombre_interno
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
	public function getDocenteEstados()
	{
		return $this->hasMany(DocenteEstado::className(), ['estado_id' => 'id']);
	}
}
