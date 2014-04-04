<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_estudio".
 *
 * @property integer $id
 * @property integer $nivel_id
 * @property string $codigo
 * @property string $nombre_completo
 * @property string $nombre_corto
 * @property integer $duracion
 * @property integer $estado_id
 * @property integer $plan_estudio_origen_id
 * @property string $resoluciones
 * @property string $normativas
 *
 * @property AnioPlanEstudio[] $anioPlanEstudios
 * @property AsignaturaPlanEstudio[] $asignaturaPlanEstudios
 * @property ConfiguracionPlanEstudio[] $configuracionPlanEstudios
 * @property EstadoPlanEstudio $estado
 * @property Nivel $nivel
 * @property PlanEstudio $planEstudioOrigen
 * @property PlanEstudio[] $planEstudios
 * @property PlanEstudioEstado[] $planEstudioEstados
 */
class PlanEstudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan_estudio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nivel_id', 'codigo', 'nombre_completo', 'nombre_corto', 'duracion', 'estado_id'], 'required'],
            [['nivel_id', 'duracion', 'estado_id', 'plan_estudio_origen_id'], 'integer'],
            [['codigo'], 'string', 'max' => 45],
            [['nombre_completo', 'resoluciones', 'normativas'], 'string', 'max' => 255],
            [['nombre_corto'], 'string', 'max' => 99],
            [['codigo'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nivel_id' => Yii::t('app', 'Nivel ID'),
            'codigo' => Yii::t('app', 'Codigo'),
            'nombre_completo' => Yii::t('app', 'Nombre Completo'),
            'nombre_corto' => Yii::t('app', 'Nombre Corto'),
            'duracion' => Yii::t('app', 'Duracion'),
            'estado_id' => Yii::t('app', 'Estado ID'),
            'plan_estudio_origen_id' => Yii::t('app', 'Plan Estudio Origen ID'),
            'resoluciones' => Yii::t('app', 'Resoluciones'),
            'normativas' => Yii::t('app', 'Normativas'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnioPlanEstudios()
    {
        return $this->hasMany(AnioPlanEstudio::className(), ['plan_estudio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturaPlanEstudios()
    {
        return $this->hasMany(AsignaturaPlanEstudio::className(), ['plan_estudio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfiguracionPlanEstudios()
    {
        return $this->hasMany(ConfiguracionPlanEstudio::className(), ['plan_estudio_id' => 'id']);
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
    public function getNivel()
    {
        return $this->hasOne(Nivel::className(), ['id' => 'nivel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanEstudioOrigen()
    {
        return $this->hasOne(PlanEstudio::className(), ['id' => 'plan_estudio_origen_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanEstudios()
    {
        return $this->hasMany(PlanEstudio::className(), ['plan_estudio_origen_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanEstudioEstados()
    {
        return $this->hasMany(PlanEstudioEstado::className(), ['plan_estudio_id' => 'id']);
    }
}
