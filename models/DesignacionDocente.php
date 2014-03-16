<?php

namespace app\models;

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
 * @property AsignaturaPlanEstudio $asignaturaPlanEstudio
 * @property Docente $docente
 * @property EstadoDesignacionDocente $estado
 * @property TipoDesignacionDocente $tipoDesignacion
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
            'id' => 'ID',
            'docente_id' => 'Docente ID',
            'asignatura_plan_estudio_id' => 'Asignatura Plan Estudio ID',
            'tipo_designacion_id' => 'Tipo Designacion ID',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'estado_id' => 'Estado ID',
        ];
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
    public function getDocente()
    {
        return $this->hasOne(Docente::className(), ['id' => 'docente_id']);
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
    public function getTipoDesignacion()
    {
        return $this->hasOne(TipoDesignacionDocente::className(), ['id' => 'tipo_designacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesignacionDocenteSeccions()
    {
        return $this->hasMany(DesignacionDocenteSeccion::className(), ['designacion_docente_id' => 'id']);
    }
}
