<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumno_estado".
 *
 * @property integer $id
 * @property integer $alumno_id
 * @property integer $estado_id
 * @property string $fecha
 *
 * @property Alumno $alumno
 * @property EstadoAlumno $estado
 */
class AlumnoEstado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumno_estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alumno_id', 'estado_id', 'fecha'], 'required'],
            [['alumno_id', 'estado_id'], 'integer'],
            [['fecha'], 'safe']
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
            'estado_id' => Yii::t('app', 'Estado ID'),
            'fecha' => Yii::t('app', 'Fecha'),
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
    public function getEstado()
    {
        return $this->hasOne(EstadoAlumno::className(), ['id' => 'estado_id']);
    }
}
