<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sede_domicilio".
 *
 * @property integer $id
 * @property integer $sede_id
 * @property string $direccion
 * @property string $cp
 * @property integer $pais_id
 * @property integer $provincia_id
 * @property integer $ciudad_id
 * @property integer $principal
 * @property string $observaciones
 *
 * @property Ciudad $ciudad
 * @property Pais $pais
 * @property Provincia $provincia
 * @property Sede $sede
 */
class SedeDomicilio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sede_domicilio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sede_id', 'direccion'], 'required'],
            [['sede_id', 'pais_id', 'provincia_id', 'ciudad_id', 'principal'], 'integer'],
            [['direccion'], 'string', 'max' => 99],
            [['cp'], 'string', 'max' => 30],
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
            'sede_id' => Yii::t('app', 'Sede ID'),
            'direccion' => Yii::t('app', 'Direccion'),
            'cp' => Yii::t('app', 'Cp'),
            'pais_id' => Yii::t('app', 'Pais ID'),
            'provincia_id' => Yii::t('app', 'Provincia ID'),
            'ciudad_id' => Yii::t('app', 'Ciudad ID'),
            'principal' => Yii::t('app', 'Principal'),
            'observaciones' => Yii::t('app', 'Observaciones'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudad()
    {
        return $this->hasOne(Ciudad::className(), ['id' => 'ciudad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPais()
    {
        return $this->hasOne(Pais::className(), ['id' => 'pais_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincia()
    {
        return $this->hasOne(Provincia::className(), ['id' => 'provincia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSede()
    {
        return $this->hasOne(Sede::className(), ['id' => 'sede_id']);
    }
}
