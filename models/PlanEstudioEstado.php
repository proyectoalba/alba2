<?php

namespace app\models;

/**
 * This is the model class for table "plan_estudio_estado".
 *
 * @property integer $id
 * @property integer $plan_estudio_id
 * @property integer $estado_id
 * @property string $fecha
 *
 * @property EstadoPlanEstudio $estado
 * @property PlanEstudio $planEstudio
 */
class PlanEstudioEstado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan_estudio_estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plan_estudio_id', 'estado_id'], 'required'],
            [['plan_estudio_id', 'estado_id'], 'integer'],
            [['fecha'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plan_estudio_id' => 'Plan Estudio ID',
            'estado_id' => 'Estado ID',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(EstadoPlanEstudio::className(), ['id' => 'estado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanEstudio()
    {
        return $this->hasOne(PlanEstudio::className(), ['id' => 'plan_estudio_id']);
    }
}
