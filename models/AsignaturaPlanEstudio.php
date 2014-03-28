<?php

namespace app\models;

/**
 * This is the model class for table "asignatura_plan_estudio".
 *
 * @property integer $id
 * @property integer $plan_estudio_id
 * @property integer $asignatura_id
 * @property integer $anio_plan_estudio_id
 * @property integer $carga_horaria_semanal
 *
 * @property AnioPlanEstudio $anioPlanEstudio
 * @property Asignatura $asignatura
 * @property PlanEstudio $planEstudio
 * @property DesignacionDocente[] $designacionDocentes
 * @property Evaluacion[] $evaluacions
 */
class AsignaturaPlanEstudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asignatura_plan_estudio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plan_estudio_id', 'asignatura_id', 'anio_plan_estudio_id'], 'required'],
            [['plan_estudio_id', 'asignatura_id', 'anio_plan_estudio_id', 'carga_horaria_semanal'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'plan_estudio_id' => Yii::t('app', 'Plan Estudio ID'),
            'asignatura_id' => Yii::t('app', 'Asignatura ID'),
            'anio_plan_estudio_id' => Yii::t('app', 'Anio Plan Estudio ID'),
            'carga_horaria_semanal' => Yii::t('app', 'Carga Horaria Semanal'),
        ];
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
    public function getAsignatura()
    {
        return $this->hasOne(Asignatura::className(), ['id' => 'asignatura_id']);
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
    public function getDesignacionDocentes()
    {
        return $this->hasMany(DesignacionDocente::className(), ['asignatura_plan_estudio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::className(), ['asignatura_plan_estudio_id' => 'id']);
    }
}
