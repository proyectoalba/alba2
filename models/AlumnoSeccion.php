<?php

namespace app\models;

/**
 * This is the model class for table "alumno_seccion".
 *
 * @property integer $id
 * @property integer $alumno_id
 * @property integer $seccion_id
 *
 * @property Seccion $seccion
 * @property Alumno $alumno
 */
class AlumnoSeccion extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'alumno_seccion';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['alumno_id', 'seccion_id'], 'required'],
			[['alumno_id', 'seccion_id'], 'integer'],
			[['alumno_id', 'seccion_id'], 'unique', 'targetAttribute' => ['alumno_id', 'seccion_id'], 'message' => 'The combination of Alumno ID and Seccion ID has already been taken.']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'alumno_id' => 'Alumno ID',
			'seccion_id' => 'Seccion ID',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getSeccion()
	{
		return $this->hasOne(Seccion::className(), ['id' => 'seccion_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getAlumno()
	{
		return $this->hasOne(Alumno::className(), ['id' => 'alumno_id']);
	}
}
