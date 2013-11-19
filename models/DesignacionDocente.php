<?php

namespace app\models;

/**
 * This is the model class for table "designacion_docente".
 *
 * @property integer $id
 * @property integer $docente_id
 * @property integer $seccion_id
 * @property integer $plan_estudio_asignatura_id
 * @property integer $tipo_designacion_id
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $estado_id
 *
 * @property Docente $docente
 * @property Seccion $seccion
 * @property TipoDesignacionDocente $tipoDesignacion
 * @property EstadoDocenteDesignacion $estado
 * @property PlanEstudioAsignatura $planEstudioAsignatura
 */
class DesignacionDocente extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'designacion_docente';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['docente_id', 'seccion_id', 'plan_estudio_asignatura_id', 'tipo_designacion_id', 'estado_id'], 'required'],
			[['docente_id', 'seccion_id', 'plan_estudio_asignatura_id', 'tipo_designacion_id', 'estado_id'], 'integer'],
			[['fecha_inicio', 'fecha_fin'], 'safe']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'docente_id' => 'Docente ID',
			'seccion_id' => 'Seccion ID',
			'plan_estudio_asignatura_id' => 'Plan Estudio Asignatura ID',
			'tipo_designacion_id' => 'Tipo Designacion ID',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'estado_id' => 'Estado ID',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDocente()
	{
		return $this->hasOne(Docente::className(), ['id' => 'docente_id']);
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
	public function getTipoDesignacion()
	{
		return $this->hasOne(TipoDesignacionDocente::className(), ['id' => 'tipo_designacion_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEstado()
	{
		return $this->hasOne(EstadoDocenteDesignacion::className(), ['id' => 'estado_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPlanEstudioAsignatura()
	{
		return $this->hasOne(PlanEstudioAsignatura::className(), ['id' => 'plan_estudio_asignatura_id']);
	}
}
