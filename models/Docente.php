<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "docente".
 *
 * @property integer $id
 * @property integer $persona_id
 * @property string $codigo
 * @property string $fecha_alta
 * @property string $observaciones
 *
 * @property DesignacionDocente[] $designacionDocentes
 * @property Persona $persona
 * @property DocenteEstado[] $docenteEstados
 * @property Evaluacion[] $evaluacions
 */
class Docente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona_id', 'codigo', 'fecha_alta'], 'required'],
            [['persona_id'], 'integer'],
            [['fecha_alta'], 'safe'],
            [['codigo'], 'string', 'max' => 255],
            [['observaciones'], 'string', 'max' => 999],
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
            'persona_id' => Yii::t('app', 'Persona ID'),
            'codigo' => Yii::t('app', 'Codigo'),
            'fecha_alta' => Yii::t('app', 'Fecha Alta'),
            'observaciones' => Yii::t('app', 'Observaciones'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesignacionDocentes()
    {
        return $this->hasMany(DesignacionDocente::className(), ['docente_id' => 'id']);
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
    public function getDocenteEstados()
    {
        return $this->hasMany(DocenteEstado::className(), ['docente_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::className(), ['docente_id' => 'id']);
    }
}
