<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ficha_salud".
 *
 * @property integer $id
 * @property integer $alumno_id
 * @property integer $servicio_salud_id
 * @property string $numero_afiliado
 * @property integer $estado_vacunacion_id
 * @property string $enfermedad
 * @property string $internacion
 * @property string $alergia
 * @property string $tratamiento
 * @property string $limitacion_fisica
 * @property string $otros
 * @property string $altura
 * @property string $peso
 *
 * @property ActualizacionSalud[] $actualizacionSaluds
 * @property ServicioSalud $servicioSalud
 * @property EstadoVacunacion $estadoVacunacion
 * @property Alumno $alumno
 */
class FichaSalud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ficha_salud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alumno_id', 'estado_vacunacion_id'], 'required'],
            [['alumno_id', 'servicio_salud_id', 'estado_vacunacion_id'], 'integer'],
            [['numero_afiliado'], 'string', 'max' => 99],
            [['enfermedad', 'internacion', 'alergia', 'tratamiento', 'limitacion_fisica', 'otros'], 'string', 'max' => 255],
            [['altura', 'peso'], 'string', 'max' => 45],
            [['alumno_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alumno_id' => Yii::t('app', 'Alumno ID'),
            'servicio_salud_id' => Yii::t('app', 'Servicio Salud ID'),
            'numero_afiliado' => Yii::t('app', 'Numero Afiliado'),
            'estado_vacunacion_id' => Yii::t('app', 'Estado Vacunacion ID'),
            'enfermedad' => Yii::t('app', 'Enfermedad'),
            'internacion' => Yii::t('app', 'Internacion'),
            'alergia' => Yii::t('app', 'Alergia'),
            'tratamiento' => Yii::t('app', 'Tratamiento'),
            'limitacion_fisica' => Yii::t('app', 'Limitacion Fisica'),
            'otros' => Yii::t('app', 'Otros'),
            'altura' => Yii::t('app', 'Altura'),
            'peso' => Yii::t('app', 'Peso'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActualizacionSaluds()
    {
        return $this->hasMany(ActualizacionSalud::className(), ['ficha_salud_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioSalud()
    {
        return $this->hasOne(ServicioSalud::className(), ['id' => 'servicio_salud_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoVacunacion()
    {
        return $this->hasOne(EstadoVacunacion::className(), ['id' => 'estado_vacunacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['id' => 'alumno_id']);
    }
}
