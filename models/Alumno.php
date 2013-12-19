<?php

namespace app\models;

/**
 * This is the model class for table "alumno".
 *
 * @property integer $id
 * @property integer $persona_id
 * @property string $codigo
 * @property integer $estado_id
 * @property string $fecha_alta
 * @property string $observaciones
 *
 * @property EstadoAlumno $estado
 * @property Persona $persona
 * @property AlumnoEstado[] $alumnoEstados
 * @property AlumnoSeccion[] $alumnoSeccions
 * @property Calificacion[] $calificacions
 * @property Inscripcion[] $inscripcions
 * @property ResponsableAlumno[] $responsableAlumnos
 */
class Alumno extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'alumno';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['persona_id', 'codigo', 'estado_id', 'fecha_alta'], 'required'],
			[['persona_id', 'estado_id'], 'integer'],
			[['fecha_alta'], 'safe'],
			[['codigo'], 'string', 'max' => 30],
			[['observaciones'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'persona_id' => 'Persona ID',
			'codigo' => 'Codigo',
			'estado_id' => 'Estado ID',
			'fecha_alta' => 'Fecha Alta',
			'observaciones' => 'Observaciones',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEstado()
	{
		return $this->hasOne(EstadoAlumno::className(), ['id' => 'estado_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPersona()
	{
		return $this->hasOne(Persona::className(), ['id' => 'persona_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getAlumnoEstados()
	{
		return $this->hasMany(AlumnoEstado::className(), ['alumno_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getAlumnoSeccions()
	{
		return $this->hasMany(AlumnoSeccion::className(), ['alumno_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getCalificacions()
	{
		return $this->hasMany(Calificacion::className(), ['alumno_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getInscripcions()
	{
		return $this->hasMany(Inscripcion::className(), ['alumno_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getResponsableAlumnos()
	{
		return $this->hasMany(ResponsableAlumno::className(), ['alumno_id' => 'id']);
	}
}
