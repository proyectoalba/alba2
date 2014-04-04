<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seccion".
 *
 * @property integer $id
 * @property integer $sede_id
 * @property integer $ciclo_lectivo_id
 * @property integer $turno_id
 * @property integer $anio_plan_estudio_id
 * @property string $identificador
 * @property integer $cupo_maximo
 *
 * @property AlumnoSeccion[] $alumnoSeccions
 * @property DesignacionDocenteSeccion[] $designacionDocenteSeccions
 * @property Evaluacion[] $evaluacions
 * @property Inasistencia[] $inasistencias
 * @property AnioPlanEstudio $anioPlanEstudio
 * @property CicloLectivo $cicloLectivo
 * @property Sede $sede
 * @property Turno $turno
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
            [['sede_id', 'ciclo_lectivo_id', 'turno_id', 'anio_plan_estudio_id', 'identificador'], 'required'],
            [['sede_id', 'ciclo_lectivo_id', 'turno_id', 'anio_plan_estudio_id', 'cupo_maximo'], 'integer'],
            [['identificador'], 'string', 'max' => 30],
            [['sede_id', 'ciclo_lectivo_id', 'turno_id', 'anio_plan_estudio_id', 'identificador'], 'unique', 'targetAttribute' => ['sede_id', 'ciclo_lectivo_id', 'turno_id', 'anio_plan_estudio_id', 'identificador'], 'message' => 'The combination of Sede ID, Ciclo Lectivo ID, Turno ID, Anio Plan Estudio ID and Identificador has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sede_id' => Yii::t('app', 'Sede ID'),
            'ciclo_lectivo_id' => Yii::t('app', 'Ciclo Lectivo ID'),
            'turno_id' => Yii::t('app', 'Turno ID'),
            'anio_plan_estudio_id' => Yii::t('app', 'Anio Plan Estudio ID'),
            'identificador' => Yii::t('app', 'Identificador'),
            'cupo_maximo' => Yii::t('app', 'Cupo Maximo'),
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
}
