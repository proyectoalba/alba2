<?php

namespace app\models;

/**
 * This is the model class for table "asignatura".
 *
 * @property integer $id
 * @property string $codigo
 * @property string $nombre
 *
 * @property PlanEstudioAsignatura[] $planEstudioAsignaturas
 */
class Asignatura extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'asignatura';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['codigo, nombre', 'required'],
			['codigo', 'string', 'max' => 45],
			['nombre', 'string', 'max' => 99]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'codigo' => 'Codigo',
			'nombre' => 'Nombre',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPlanEstudioAsignaturas()
	{
		return $this->hasMany(PlanEstudioAsignatura::className(), ['asignatura_id' => 'id']);
	}
}
