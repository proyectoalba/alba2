<?php

namespace app\models;

/**
 * This is the model class for table "seccion".
 *
 * @property integer $id
 * @property integer $sede_id
 * @property integer $plan_estudio_id
 * @property integer $ciclo_lectivo_id
 * @property integer $turno_id
 * @property integer $anio_id
 * @property string $identificador
 * @property integer $cupo_maximo
 *
 * @property AlumnoSeccion[] $alumnoSeccions
 * @property DesignacionDocenteSeccion[] $designacionDocenteSeccions
 * @property Evaluacion[] $evaluacions
 * @property Inasistencia[] $inasistencias
 * @property AnioPlanEstudio $anio
 * @property Sede $sede
 * @property Turno $turno
 * @property PlanEstudio $planEstudio
 * @property CicloLectivo $cicloLectivo
 */
class Seccion extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'seccion';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['sede_id', 'plan_estudio_id', 'ciclo_lectivo_id', 'turno_id', 'anio_id', 'identificador'], 'required'],
			[['sede_id', 'plan_estudio_id', 'ciclo_lectivo_id', 'turno_id', 'anio_id', 'cupo_maximo'], 'integer'],
			[['identificador'], 'string', 'max' => 30],
			[['sede_id', 'ciclo_lectivo_id', 'turno_id', 'anio_id', 'identificador'], 'unique', 'targetAttribute' => ['sede_id', 'ciclo_lectivo_id', 'turno_id', 'anio_id', 'identificador'], 'message' => 'The combination of Sede ID, Ciclo Lectivo ID, Turno ID, Anio ID and Identificador has already been taken.']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'sede_id' => 'Sede ID',
			'plan_estudio_id' => 'Plan Estudio ID',
			'ciclo_lectivo_id' => 'Ciclo Lectivo ID',
			'turno_id' => 'Turno ID',
			'anio_id' => 'Anio ID',
			'identificador' => 'Identificador',
			'cupo_maximo' => 'Cupo Maximo',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAlumnoSeccions()
	{
		return $this->hasMany(AlumnoSeccion::className(), ['seccion_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getDesignacionDocenteSeccions()
	{
		return $this->hasMany(DesignacionDocenteSeccion::className(), ['seccion_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getEvaluacions()
	{
		return $this->hasMany(Evaluacion::className(), ['seccion_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getInasistencias()
	{
		return $this->hasMany(Inasistencia::className(), ['seccion_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAnio()
	{
		return $this->hasOne(AnioPlanEstudio::className(), ['id' => 'anio_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSede()
	{
		return $this->hasOne(Sede::className(), ['id' => 'sede_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTurno()
	{
		return $this->hasOne(Turno::className(), ['id' => 'turno_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getPlanEstudio()
	{
		return $this->hasOne(PlanEstudio::className(), ['id' => 'plan_estudio_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCicloLectivo()
	{
		return $this->hasOne(CicloLectivo::className(), ['id' => 'ciclo_lectivo_id']);
	}
}
