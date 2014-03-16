<?php

namespace app\models;

/**
 * This is the model class for table "calificacion".
 *
 * @property integer $id
 * @property integer $evaluacion_id
 * @property integer $alumno_id
 * @property integer $valor_calificacion_id
 * @property string $fecha
 *
 * @property Alumno $alumno
 * @property Evaluacion $evaluacion
 * @property ValorCalificacion $valorCalificacion
 */
class Calificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['evaluacion_id', 'alumno_id', 'valor_calificacion_id', 'fecha'], 'required'],
            [['evaluacion_id', 'alumno_id', 'valor_calificacion_id'], 'integer'],
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
            'evaluacion_id' => 'Evaluacion ID',
            'alumno_id' => 'Alumno ID',
            'valor_calificacion_id' => 'Valor Calificacion ID',
            'fecha' => 'Fecha',
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
    public function getEvaluacion()
    {
        return $this->hasOne(Evaluacion::className(), ['id' => 'evaluacion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValorCalificacion()
    {
        return $this->hasOne(ValorCalificacion::className(), ['id' => 'valor_calificacion_id']);
    }
}
