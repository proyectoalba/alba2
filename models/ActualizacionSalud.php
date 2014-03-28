<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actualizacion_salud".
 *
 * @property integer $id
 * @property integer $ficha_salud_id
 * @property string $observaciones
 * @property string $fecha
 *
 * @property FichaSalud $fichaSalud
 */
class ActualizacionSalud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actualizacion_salud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ficha_salud_id', 'observaciones', 'fecha'], 'required'],
            [['ficha_salud_id'], 'integer'],
            [['fecha'], 'safe'],
            [['observaciones'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ficha_salud_id' => Yii::t('app', 'Ficha Salud ID'),
            'observaciones' => Yii::t('app', 'Observaciones'),
            'fecha' => Yii::t('app', 'Fecha'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichaSalud()
    {
        return $this->hasOne(FichaSalud::className(), ['id' => 'ficha_salud_id']);
    }
}
