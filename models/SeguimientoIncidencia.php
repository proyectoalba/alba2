<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seguimiento_incidencia".
 *
 * @property integer $id
 * @property integer $incidencia_id
 * @property string $fecha
 * @property string $detalle
 *
 * @property AdjuntoSeguimientoIncidencia[] $adjuntoSeguimientoIncidencias
 * @property Incidencia $incidencia
 */
class SeguimientoIncidencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seguimiento_incidencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'incidencia_id', 'fecha', 'detalle'], 'required'],
            [['id', 'incidencia_id'], 'integer'],
            [['fecha'], 'safe'],
            [['detalle'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'incidencia_id' => Yii::t('app', 'Incidencia ID'),
            'fecha' => Yii::t('app', 'Fecha'),
            'detalle' => Yii::t('app', 'Detalle'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdjuntoSeguimientoIncidencias()
    {
        return $this->hasMany(AdjuntoSeguimientoIncidencia::className(), ['seguimiento_incidencia_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidencia()
    {
        return $this->hasOne(Incidencia::className(), ['id' => 'incidencia_id']);
    }
}
