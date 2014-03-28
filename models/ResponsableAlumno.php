<?php

namespace app\models;

/**
 * This is the model class for table "responsable_alumno".
 *
 * @property integer $id
 * @property integer $persona_id
 * @property integer $alumno_id
 * @property integer $actividad_id
 * @property integer $nivel_instruccion_id
 * @property integer $tipo_responsable_id
 * @property string $ocupacion
 * @property integer $autorizado_retirar
 * @property integer $vive
 * @property string $observaciones
 *
 * @property ActividadResponsable $actividad
 * @property Alumno $alumno
 * @property NivelInstruccion $nivelInstruccion
 * @property Persona $persona
 * @property TipoResponsable $tipoResponsable
 */
class ResponsableAlumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'responsable_alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona_id', 'alumno_id', 'actividad_id', 'nivel_instruccion_id'], 'required'],
            [['persona_id', 'alumno_id', 'actividad_id', 'nivel_instruccion_id', 'tipo_responsable_id', 'autorizado_retirar', 'vive'], 'integer'],
            [['ocupacion', 'observaciones'], 'string', 'max' => 255],
            [['persona_id', 'alumno_id'], 'unique', 'targetAttribute' => ['persona_id', 'alumno_id'], 'message' => 'The combination of Persona ID and Alumno ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'persona_id' => Yii::t('app', 'Persona ID'),
            'alumno_id' => Yii::t('app', 'Alumno ID'),
            'actividad_id' => Yii::t('app', 'Actividad ID'),
            'nivel_instruccion_id' => Yii::t('app', 'Nivel Instruccion ID'),
            'tipo_responsable_id' => Yii::t('app', 'Tipo Responsable ID'),
            'ocupacion' => Yii::t('app', 'Ocupacion'),
            'autorizado_retirar' => Yii::t('app', 'Autorizado Retirar'),
            'vive' => Yii::t('app', 'Vive'),
            'observaciones' => Yii::t('app', 'Observaciones'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividad()
    {
        return $this->hasOne(ActividadResponsable::className(), ['id' => 'actividad_id']);
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
    public function getNivelInstruccion()
    {
        return $this->hasOne(NivelInstruccion::className(), ['id' => 'nivel_instruccion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['id' => 'persona_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoResponsable()
    {
        return $this->hasOne(TipoResponsable::className(), ['id' => 'tipo_responsable_id']);
    }
}
