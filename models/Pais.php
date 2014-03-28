<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pais".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $codigo
 *
 * @property EstablecimientoProcedencia[] $establecimientoProcedencias
 * @property PersonaDomicilio[] $personaDomicilios
 * @property Provincia[] $provincias
 * @property SedeDomicilio[] $sedeDomicilios
 * @property ServicioSaludContacto[] $servicioSaludContactos
 */
class Pais extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pais';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'codigo'], 'required'],
            [['nombre'], 'string', 'max' => 60],
            [['codigo'], 'string', 'max' => 3],
            [['nombre'], 'unique'],
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
            'nombre' => Yii::t('app', 'Nombre'),
            'codigo' => Yii::t('app', 'Codigo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstablecimientoProcedencias()
    {
        return $this->hasMany(EstablecimientoProcedencia::className(), ['pais_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaDomicilios()
    {
        return $this->hasMany(PersonaDomicilio::className(), ['pais_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincias()
    {
        return $this->hasMany(Provincia::className(), ['pais_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSedeDomicilios()
    {
        return $this->hasMany(SedeDomicilio::className(), ['pais_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioSaludContactos()
    {
        return $this->hasMany(ServicioSaludContacto::className(), ['pais_id' => 'id']);
    }
}
