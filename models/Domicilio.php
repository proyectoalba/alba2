<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "domicilio".
 *
 * @property integer $id
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
 * @property PersonaDomicilio[] $personaDomicilios
 * @property SedeDomicilio[] $sedeDomicilios
 * @property ServicioSaludDomicilio[] $servicioSaludDomicilios
 * 
 * @property Sede $sede
 */
class Domicilio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'domicilio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['direccion'], 'required'],
            [['pais_id', 'provincia_id', 'ciudad_id', 'principal'], 'integer'],
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
    public function getPersonaDomicilios()
    {
        return $this->hasMany(PersonaDomicilio::className(), ['domicilio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSedeDomicilios()
    {
        return $this->hasMany(SedeDomicilio::className(), ['domicilio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioSaludDomicilios()
    {
        return $this->hasMany(ServicioSaludDomicilio::className(), ['domicilio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSede()
    {
        return $this->hasOne(Sede::className(), ['id' => 'sede_id'])
            ->viaTable('sede_domicilio', ['domicilio_id' => 'id']);
    }
}
