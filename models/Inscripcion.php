<?php

namespace app\models;

/**
 * This is the model class for table "inscripcion".
 *
 * @property integer $id
 * @property integer $alumno_id
 * @property integer $anio_id
 * @property integer $turno_id
 * @property integer $ciclo_lectivo_id
 * @property string $fecha
 * @property integer $estado_id
 * @property integer $sede_id
 * @property integer $plan_estudio_id
 * @property integer $condicion_id
 * @property string $observaciones
 *
 * @property DocumentacionInscripcion[] $documentacionInscripcions
 * @property EstablecimientoProcedencia[] $establecimientoProcedencias
 * @property Alumno $alumno
 * @property PlanEstudioAnio $anio
 * @property Turno $turno
 * @property EstadoInscripcion $estado
 * @property Sede $sede
 * @property PlanEstudio $planEstudio
 * @property CicloLectivo $cicloLectivo
 * @property CondicionInscripcion $condicion
 * @property InscripcionEstado[] $inscripcionEstados
 * @property InscripcionInformacionAdicional[] $inscripcionInformacionAdicionals
 */
class Inscripcion extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'inscripcion';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['alumno_id, anio_id, turno_id, ciclo_lectivo_id, fecha, estado_id, sede_id, plan_estudio_id', 'required'],
			['alumno_id, anio_id, turno_id, ciclo_lectivo_id, estado_id, sede_id, plan_estudio_id, condicion_id', 'integer'],
			['fecha', 'safe'],
			['observaciones', 'string', 'max' => 999]
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
			'anio_id' => 'Anio ID',
			'turno_id' => 'Turno ID',
			'ciclo_lectivo_id' => 'Ciclo Lectivo ID',
			'fecha' => 'Fecha',
			'estado_id' => 'Estado ID',
			'sede_id' => 'Sede ID',
			'plan_estudio_id' => 'Plan Estudio ID',
			'condicion_id' => 'Condicion ID',
			'observaciones' => 'Observaciones',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDocumentacionInscripcions()
	{
		return $this->hasMany(DocumentacionInscripcion::className(), ['inscripcion_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEstablecimientoProcedencias()
	{
		return $this->hasMany(EstablecimientoProcedencia::className(), ['inscripcion_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getAlumno()
	{
		return $this->hasOne(Alumno::className(), ['id' => 'alumno_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getAnio()
	{
		return $this->hasOne(PlanEstudioAnio::className(), ['id' => 'anio_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTurno()
	{
		return $this->hasOne(Turno::className(), ['id' => 'turno_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEstado()
	{
		return $this->hasOne(EstadoInscripcion::className(), ['id' => 'estado_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getSede()
	{
		return $this->hasOne(Sede::className(), ['id' => 'sede_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPlanEstudio()
	{
		return $this->hasOne(PlanEstudio::className(), ['id' => 'plan_estudio_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getCicloLectivo()
	{
		return $this->hasOne(CicloLectivo::className(), ['id' => 'ciclo_lectivo_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getCondicion()
	{
		return $this->hasOne(CondicionInscripcion::className(), ['id' => 'condicion_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getInscripcionEstados()
	{
		return $this->hasMany(InscripcionEstado::className(), ['inscripcion_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getInscripcionInformacionAdicionals()
	{
		return $this->hasMany(InscripcionInformacionAdicional::className(), ['inscripcion_id' => 'id']);
	}
}
