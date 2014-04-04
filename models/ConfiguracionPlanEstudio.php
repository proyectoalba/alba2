<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "configuracion_plan_estudio".
 *
 * @property integer $id
 * @property integer $plan_estudio_id
 * @property integer $tipo_calificacion_id
 * @property integer $tipo_inasistencia_id
 *
 * @property TipoCalificacion $tipoCalificacion
 * @property TipoInasistencia $tipoInasistencia
 * @property PlanEstudio $planEstudio
 */
class ConfiguracionPlanEstudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'configuracion_plan_estudio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plan_estudio_id', 'tipo_calificacion_id', 'tipo_inasistencia_id'], 'required'],
            [['plan_estudio_id', 'tipo_calificacion_id', 'tipo_inasistencia_id'], 'integer'],
            [['plan_estudio_id'], 'unique']
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
            'tipo_calificacion_id' => Yii::t('app', 'Tipo Calificacion ID'),
            'tipo_inasistencia_id' => Yii::t('app', 'Tipo Inasistencia ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoCalificacion()
    {
        return $this->hasOne(TipoCalificacion::className(), ['id' => 'tipo_calificacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoInasistencia()
    {
        return $this->hasOne(TipoInasistencia::className(), ['id' => 'tipo_inasistencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanEstudio()
    {
        return $this->hasOne(PlanEstudio::className(), ['id' => 'plan_estudio_id']);
    }
}
