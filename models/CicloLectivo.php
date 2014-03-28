<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ciclo_lectivo".
 *
 * @property integer $id
 * @property integer $anio
 * @property integer $nivel_id
 * @property string $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $estado_id
 * @property integer $activo
 *
 * @property EstadoCicloLectivo $estado
 * @property Nivel $nivel
 * @property CicloLectivoEstado[] $cicloLectivoEstados
 * @property Inscripcion[] $inscripcions
 * @property PeriodoCicloLectivo[] $periodoCicloLectivos
 * @property Seccion[] $seccions
 */
class CicloLectivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ciclo_lectivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anio', 'nivel_id', 'estado_id'], 'required'],
            [['anio', 'nivel_id', 'estado_id', 'activo'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['descripcion'], 'string', 'max' => 60],
            [['anio', 'nivel_id'], 'unique', 'targetAttribute' => ['anio', 'nivel_id'], 'message' => 'The combination of Anio and Nivel ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'anio' => Yii::t('app', 'Anio'),
            'nivel_id' => Yii::t('app', 'Nivel ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'estado_id' => Yii::t('app', 'Estado ID'),
            'activo' => Yii::t('app', 'Activo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(EstadoCicloLectivo::className(), ['id' => 'estado_id']);
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
    public function getCicloLectivoEstados()
    {
        return $this->hasMany(CicloLectivoEstado::className(), ['ciclo_lectivo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcions()
    {
        return $this->hasMany(Inscripcion::className(), ['ciclo_lectivo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodoCicloLectivos()
    {
        return $this->hasMany(PeriodoCicloLectivo::className(), ['ciclo_lectivo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeccions()
    {
        return $this->hasMany(Seccion::className(), ['ciclo_lectivo_id' => 'id']);
    }
}
