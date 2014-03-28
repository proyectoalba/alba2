<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "incidencia".
 *
 * @property integer $id
 * @property integer $alumno_id
 * @property integer $tipo_incidencia_id
 * @property string $fecha
 * @property string $detalle
 *
 * @property Alumno $alumno
 * @property TipoIncidencia $tipoIncidencia
 * @property SeguimientoIncidencia[] $seguimientoIncidencias
 */
class Incidencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'incidencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'alumno_id', 'tipo_incidencia_id', 'fecha', 'detalle'], 'required'],
            [['id', 'alumno_id', 'tipo_incidencia_id'], 'integer'],
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
            'alumno_id' => Yii::t('app', 'Alumno ID'),
            'tipo_incidencia_id' => Yii::t('app', 'Tipo Incidencia ID'),
            'fecha' => Yii::t('app', 'Fecha'),
            'detalle' => Yii::t('app', 'Detalle'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['id' => 'alumno_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoIncidencia()
    {
        return $this->hasOne(TipoIncidencia::className(), ['id' => 'tipo_incidencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeguimientoIncidencias()
    {
        return $this->hasMany(SeguimientoIncidencia::className(), ['incidencia_id' => 'id']);
    }
}
