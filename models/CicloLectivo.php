<?php

namespace app\models;

/**
 * This is the model class for table "ciclo_lectivo".
 *
 * @property integer $id
 * @property integer $anio
 * @property integer $nivel_id
 * @property string $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $estado_id
 * @property boolean $activo
 *
 * @property EstadoCicloLectivo $estado
 * @property Nivel $nivel
 * @property CicloLectivoEstado[] $cicloLectivoEstados
 * @property Inscripcion[] $inscripcions
 * @property PeriodoCicloLectivo[] $periodoCicloLectivos
 */
class CicloLectivo extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'ciclo_lectivo';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['anio, nivel_id, estado_id', 'required'],
			['anio, nivel_id, estado_id', 'integer'],
			['fecha_inicio, fecha_fin', 'safe'],
			['activo', 'boolean'],
			['descripcion', 'string', 'max' => 60]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'anio' => 'Anio',
			'nivel_id' => 'Nivel ID',
			'descripcion' => 'Descripcion',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'estado_id' => 'Estado ID',
			'activo' => 'Activo',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEstado()
	{
		return $this->hasOne(EstadoCicloLectivo::className(), ['id' => 'estado_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getNivel()
	{
		return $this->hasOne(Nivel::className(), ['id' => 'nivel_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getCicloLectivoEstados()
	{
		return $this->hasMany(CicloLectivoEstado::className(), ['ciclo_lectivo_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getInscripcions()
	{
		return $this->hasMany(Inscripcion::className(), ['ciclo_lectivo_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPeriodoCicloLectivos()
	{
		return $this->hasMany(PeriodoCicloLectivo::className(), ['ciclo_lectivo_id' => 'id']);
	}
}
