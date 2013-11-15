<?php

namespace app\models;

/**
 * This is the model class for table "estado_alumno".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $nombre_interno
 *
 * @property Alumno[] $alumnos
 * @property AlumnoEstado[] $alumnoEstados
 */
class EstadoAlumno extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'estado_alumno';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['descripcion, nombre_interno', 'required'],
			['descripcion, nombre_interno', 'string', 'max' => 60]
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
	public function getAlumnos()
	{
		return $this->hasMany(Alumno::className(), ['estado_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getAlumnoEstados()
	{
		return $this->hasMany(AlumnoEstado::className(), ['estado_id' => 'id']);
	}
}
