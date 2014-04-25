<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "adjunto_seguimiento_incidencia".
 *
 * @property integer $id
 * @property integer $seguimiento_incidencia_id
 * @property string $filename
 * @property string $fecha
 *
 * @property SeguimientoIncidencia $seguimientoIncidencia
 */
class AdjuntoSeguimientoIncidencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adjunto_seguimiento_incidencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seguimiento_incidencia_id', 'filename', 'fecha'], 'required'],
            [['seguimiento_incidencia_id'], 'integer'],
            [['fecha'], 'safe'],
            [['filename'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'seguimiento_incidencia_id' => Yii::t('app', 'Seguimiento Incidencia ID'),
            'filename' => Yii::t('app', 'Filename'),
            'fecha' => Yii::t('app', 'Fecha'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeguimientoIncidencia()
    {
        return $this->hasOne(SeguimientoIncidencia::className(), ['id' => 'seguimiento_incidencia_id']);
    }
}
