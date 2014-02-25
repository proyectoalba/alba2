<?php

namespace app\models;

/**
 * This is the model class for table "responsable_alumno".
 *
 * @property integer $id
 * @property integer $persona_id
 * @property integer $alumno_id
 * @property integer $actividad_id
 * @property integer $nivel_instruccion_id
 * @property integer $tipo_responsable_id
 * @property string $ocupacion
 * @property integer $autorizado_retirar
 * @property integer $vive
 * @property string $observaciones
 *
 * @property Alumno $alumno
 * @property TipoResponsable $tipoResponsable
 * @property Persona $persona
 * @property NivelInstruccion $nivelInstruccion
 * @property ActividadResponsable $actividad
 */
class ResponsableAlumno extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'responsable_alumno';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['persona_id', 'alumno_id', 'actividad_id', 'nivel_instruccion_id'], 'required'],
			[['persona_id', 'alumno_id', 'actividad_id', 'nivel_instruccion_id', 'tipo_responsable_id', 'autorizado_retirar', 'vive'], 'integer'],
			[['ocupacion', 'observaciones'], 'string', 'max' => 255],
			[['persona_id', 'alumno_id'], 'unique', 'targetAttribute' => ['persona_id', 'alumno_id'], 'message' => 'The combination of Persona ID and Alumno ID has already been taken.']
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
			'alumno_id' => 'Alumno ID',
			'actividad_id' => 'Actividad ID',
			'nivel_instruccion_id' => 'Nivel Instruccion ID',
			'tipo_responsable_id' => 'Tipo Responsable ID',
			'ocupacion' => 'Ocupacion',
			'autorizado_retirar' => 'Autorizado Retirar',
			'vive' => 'Vive',
			'observaciones' => 'Observaciones',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAlumno()
	{
		return $this->hasOne(Alumno::className(), ['id' => 'alumno_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTipoResponsable()
	{
		return $this->hasOne(TipoResponsable::className(), ['id' => 'tipo_responsable_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getPersona()
	{
		return $this->hasOne(Persona::className(), ['id' => 'persona_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getNivelInstruccion()
	{
		return $this->hasOne(NivelInstruccion::className(), ['id' => 'nivel_instruccion_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getActividad()
	{
		return $this->hasOne(ActividadResponsable::className(), ['id' => 'actividad_id']);
	}
}
