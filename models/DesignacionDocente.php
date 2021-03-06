<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "designacion_docente".
 *
 * @property integer $id
 * @property integer $docente_id
 * @property integer $asignatura_plan_estudio_id
 * @property integer $tipo_designacion_id
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $estado_id
 *
 * @property Docente $docente
 * @property TipoDesignacionDocente $tipoDesignacion
 * @property EstadoDesignacionDocente $estado
 * @property AsignaturaPlanEstudio $asignaturaPlanEstudio
 * @property DesignacionDocenteSeccion[] $designacionDocenteSeccions
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
            [['docente_id', 'asignatura_plan_estudio_id', 'tipo_designacion_id', 'estado_id'], 'required'],
            [['docente_id', 'asignatura_plan_estudio_id', 'tipo_designacion_id', 'estado_id'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'docente_id' => Yii::t('app', 'Docente ID'),
            'asignatura_plan_estudio_id' => Yii::t('app', 'Asignatura Plan Estudio ID'),
            'tipo_designacion_id' => Yii::t('app', 'Tipo Designacion ID'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'estado_id' => Yii::t('app', 'Estado ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocente()
    {
        return $this->hasOne(Docente::className(), ['id' => 'docente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDesignacion()
    {
        return $this->hasOne(TipoDesignacionDocente::className(), ['id' => 'tipo_designacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(EstadoDesignacionDocente::className(), ['id' => 'estado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturaPlanEstudio()
    {
        return $this->hasOne(AsignaturaPlanEstudio::className(), ['id' => 'asignatura_plan_estudio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesignacionDocenteSeccions()
    {
        return $this->hasMany(DesignacionDocenteSeccion::className(), ['designacion_docente_id' => 'id']);
    }
}
