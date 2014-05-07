<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "docente".
 *
 * @property integer $id
 * @property integer $perfil_id
 * @property string $codigo
 * @property string $observaciones
 *
 * @property DesignacionDocente[] $designacionDocentes
 * @property Perfil $perfil
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
            [['perfil_id', 'codigo'], 'required'],
            [['perfil_id'], 'integer'],
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
            'perfil_id' => Yii::t('app', 'Perfil ID'),
            'codigo' => Yii::t('app', 'Codigo'),
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
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id' => 'perfil_id']);
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
