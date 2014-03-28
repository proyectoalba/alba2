<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anio_plan_estudio".
 *
 * @property integer $id
 * @property integer $plan_estudio_id
 * @property string $descripcion
 * @property integer $orden
 *
 * @property PlanEstudio $planEstudio
 * @property AsignaturaPlanEstudio[] $asignaturaPlanEstudios
 * @property Inscripcion[] $inscripcions
 * @property Seccion[] $seccions
 */
class AnioPlanEstudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anio_plan_estudio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plan_estudio_id', 'descripcion', 'orden'], 'required'],
            [['plan_estudio_id', 'orden'], 'integer'],
            [['descripcion'], 'string', 'max' => 30]
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
            'descripcion' => Yii::t('app', 'Descripcion'),
            'orden' => Yii::t('app', 'Orden'),
        ];
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
    public function getAsignaturaPlanEstudios()
    {
        return $this->hasMany(AsignaturaPlanEstudio::className(), ['anio_plan_estudio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcions()
    {
        return $this->hasMany(Inscripcion::className(), ['anio_plan_estudio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeccions()
    {
        return $this->hasMany(Seccion::className(), ['anio_plan_estudio_id' => 'id']);
    }
}
