<?php

namespace app\models;

/**
 * This is the model class for table "responsable_actividad".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property ResponsableAlumno[] $responsableAlumnos
 */
class ResponsableActividad extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'responsable_actividad';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['descripcion', 'required'],
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
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getResponsableAlumnos()
	{
		return $this->hasMany(ResponsableAlumno::className(), ['actividad_id' => 'id']);
	}
}
