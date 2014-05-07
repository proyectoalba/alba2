<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "responsable".
 *
 * @property integer $id
 * @property integer $perfil_id
 * @property integer $actividad_id
 * @property integer $nivel_instruccion_id
 * @property integer $tipo_responsable_id
 * @property string $ocupacion
 * @property integer $autorizado_retirar
 * @property integer $vive
 * @property string $observaciones
 *
 * @property TipoResponsable $tipoResponsable
 * @property Perfil $perfil
 * @property NivelInstruccion $nivelInstruccion
 * @property ActividadResponsable $actividad
 * @property ResponsableAlumno[] $responsableAlumnos
 */
class Responsable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'responsable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perfil_id', 'actividad_id', 'nivel_instruccion_id'], 'required'],
            [['perfil_id', 'actividad_id', 'nivel_instruccion_id', 'tipo_responsable_id', 'autorizado_retirar', 'vive'], 'integer'],
            [['ocupacion', 'observaciones'], 'string', 'max' => 255],
            [['perfil_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'perfil_id' => Yii::t('app', 'Perfil ID'),
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
    public function getTipoResponsable()
    {
        return $this->hasOne(TipoResponsable::className(), ['id' => 'tipo_responsable_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id' => 'perfil_id']);
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
    public function getActividad()
    {
        return $this->hasOne(ActividadResponsable::className(), ['id' => 'actividad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsableAlumnos()
    {
        return $this->hasMany(ResponsableAlumno::className(), ['responsable_id' => 'id']);
    }
}
