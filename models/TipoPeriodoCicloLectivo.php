<?php

namespace app\models;

/**
 * This is the model class for table "tipo_periodo_ciclo_lectivo".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $periodos_por_ciclo
 * @property integer $nivel_id
 *
 * @property PeriodoCicloLectivo[] $periodoCicloLectivos
 * @property Nivel $nivel
 */
class TipoPeriodoCicloLectivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_periodo_ciclo_lectivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'periodos_por_ciclo', 'nivel_id'], 'required'],
            [['periodos_por_ciclo', 'nivel_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 45],
            [['descripcion'], 'unique'],
            [['nivel_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'periodos_por_ciclo' => Yii::t('app', 'Periodos Por Ciclo'),
            'nivel_id' => Yii::t('app', 'Nivel ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodoCicloLectivos()
    {
        return $this->hasMany(PeriodoCicloLectivo::className(), ['tipo_periodo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNivel()
    {
        return $this->hasOne(Nivel::className(), ['id' => 'nivel_id']);
    }
}
