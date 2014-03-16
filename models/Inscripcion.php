<?php

namespace app\models;

/**
 * This is the model class for table "inscripcion".
 *
 * @property integer $id
 * @property integer $alumno_id
 * @property integer $anio_plan_estudio_id
 * @property integer $turno_id
 * @property integer $ciclo_lectivo_id
 * @property integer $estado_id
 * @property integer $sede_id
 * @property integer $condicion_id
 * @property string $fecha
 * @property string $observaciones
 *
 * @property DocumentacionInscripcion[] $documentacionInscripcions
 * @property EstablecimientoProcedencia[] $establecimientoProcedencias
 * @property Alumno $alumno
 * @property AnioPlanEstudio $anioPlanEstudio
 * @property CicloLectivo $cicloLectivo
 * @property CondicionInscripcion $condicion
 * @property EstadoInscripcion $estado
 * @property Sede $sede
 * @property Turno $turno
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
            [['alumno_id', 'turno_id', 'ciclo_lectivo_id', 'estado_id', 'sede_id'], 'required'],
            [['alumno_id', 'anio_plan_estudio_id', 'turno_id', 'ciclo_lectivo_id', 'estado_id', 'sede_id', 'condicion_id'], 'integer'],
            [['fecha'], 'safe'],
            [['observaciones'], 'string', 'max' => 999]
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
            'anio_plan_estudio_id' => 'Anio Plan Estudio ID',
            'turno_id' => 'Turno ID',
            'ciclo_lectivo_id' => 'Ciclo Lectivo ID',
            'estado_id' => 'Estado ID',
            'sede_id' => 'Sede ID',
            'condicion_id' => 'Condicion ID',
            'fecha' => 'Fecha',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentacionInscripcions()
    {
        return $this->hasMany(DocumentacionInscripcion::className(), ['inscripcion_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstablecimientoProcedencias()
    {
        return $this->hasMany(EstablecimientoProcedencia::className(), ['inscripcion_id' => 'id']);
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
    public function getAnioPlanEstudio()
    {
        return $this->hasOne(AnioPlanEstudio::className(), ['id' => 'anio_plan_estudio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCicloLectivo()
    {
        return $this->hasOne(CicloLectivo::className(), ['id' => 'ciclo_lectivo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCondicion()
    {
        return $this->hasOne(CondicionInscripcion::className(), ['id' => 'condicion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(EstadoInscripcion::className(), ['id' => 'estado_id']);
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
    public function getInscripcionEstados()
    {
        return $this->hasMany(InscripcionEstado::className(), ['inscripcion_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcionInformacionAdicionals()
    {
        return $this->hasMany(InscripcionInformacionAdicional::className(), ['inscripcion_id' => 'id']);
    }
}
