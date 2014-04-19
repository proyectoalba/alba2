<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumno".
 *
 * @property integer $id
 * @property integer $persona_id
 * @property integer $estado_id
 * @property string $fecha_alta
 * @property string $observaciones
 *
 * @property EstadoAlumno $estado
 * @property FichaAlumno $fichasAlumno
 * @property FichaSalud $fichasSalud
 * @property Persona $persona
 * @property AlumnoEstado[] $estados
 * @property AlumnoSeccion[] $secciones
 * @property Calificacion[] $calificaciones
 * @property Inasistencia[] $inasistencias
 * @property Incidencia[] $incidencias
 * @property Inscripcion[] $inscripciones
 * @property ResponsableAlumno[] $responsables
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
            [['persona_id', 'estado_id', 'fecha_alta'], 'required'],
            [['persona_id', 'estado_id'], 'integer'],
            [['fecha_alta'], 'safe'],
            [['observaciones'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'persona_id' => Yii::t('app', 'Persona ID'),
            'estado_id' => Yii::t('app', 'Estado ID'),
            'fecha_alta' => Yii::t('app', 'Fecha Alta'),
            'observaciones' => Yii::t('app', 'Observaciones'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(EstadoAlumno::className(), ['id' => 'estado_id']);
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
    public function getEstados()
    {
        return $this->hasMany(AlumnoEstado::className(), ['alumno_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecciones()
    {
        return $this->hasMany(AlumnoSeccion::className(), ['alumno_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalificaciones()
    {
        return $this->hasMany(Calificacion::className(), ['alumno_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichaAlumno()
    {
        return $this->hasOne(FichaAlumno::className(), ['alumno_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichaSalud()
    {
        return $this->hasOne(FichaSalud::className(), ['alumno_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInasistencias()
    {
        return $this->hasMany(Inasistencia::className(), ['alumno_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidencias()
    {
        return $this->hasMany(Incidencia::className(), ['alumno_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripciones()
    {
        return $this->hasMany(Inscripcion::className(), ['alumno_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsables()
    {
        return $this->hasMany(ResponsableAlumno::className(), ['alumno_id' => 'id']);
    }
}
