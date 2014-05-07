<?php

namespace app\models;

use Yii;
use app\components\behaviors\RegistrarEstadoBehavior;

/**
 * This is the model class for table "alumno".
 *
 * @property integer $id
 * @property integer $perfil_id
 * @property integer $cuenta_id
 * @property integer $estado_id
 * @property string $observaciones
 *
 * @property EstadoAlumno $estado
 * @property Perfil $perfil
 * @property Cuenta $cuenta
 * @property FichaAlumno $fichaAlumno
 * @property FichaSalud $fichaSalud
 * @property AlumnoEstado[] $estados
 * @property AlumnoSeccion[] $secciones
 * @property Calificacion[] $calificaciones
 * @property ContactoEmergencia[] $contactosEmergencia
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
            [['estado_id'], 'required'],
            [['perfil_id', 'cuenta_id', 'estado_id'], 'integer'],
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
            'perfil_id' => Yii::t('app', 'Perfil ID'),
            'cuenta_id' => Yii::t('app', 'Cuenta ID'),
            'estado_id' => Yii::t('app', 'Estado ID'),
            'observaciones' => Yii::t('app', 'Observaciones'),
        ];
    }

    /**
     * @inheritdoc
     */ 
    public function behaviors()
    {
        return [
            'registrarEstado' => [
                'class' => RegistrarEstadoBehavior::className(),
                'estadoModel' => 'app\models\AlumnoEstado',
                'columnaReferencia' => 'alumno_id',
            ],
        ];
    }

    /**
     * Verifica que el alumno se pueda eliminar.
     * 
     * Para que un alumno se pueda eliminar no tiene que estar referenciado desde:
     * * inscripcion
     * * alumno_seccion
     * * insasitencia
     * * calificacion
     * * incidencia
     * * ficha_alumno
     * * ficha_salud
     * * contacto_emergencia
     *
     * En caso de que se pueda, eliminar lo siguiente en cascada:
     * * alumno_estado
     * * relación con responsables
     * 
     */
    public function isDeletable()
    {
        return (
            empty($this->inscripciones) &&
            empty($this->secciones) &&
            empty($this->inasistencias) &&
            empty($this->calificaciones) &&
            empty($this->incidencias) &&
            $this->fichaAlumno === null &&
            $this->fichaSalud === null &&
            empty($this->contactosEmergencia)
        );
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
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id' => 'perfil_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuenta()
    {
        return $this->hasOne(Cuenta::className(), ['id' => 'cuenta_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstados()
    {
        return $this->hasMany(AlumnoEstado::className(), ['alumno_id' => 'id'])->orderBy('fecha ASC');
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
    public function getContactosEmergencia()
    {
        return $this->hasMany(ContactoEmergencia::className(), ['alumno_id' => 'id']);
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
