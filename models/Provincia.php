<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provincia".
 *
 * @property integer $id
 * @property integer $pais_id
 * @property string $nombre
 *
 * @property Ciudad[] $ciudads
 * @property EstablecimientoProcedencia[] $establecimientoProcedencias
 * @property PersonaDomicilio[] $personaDomicilios
 * @property Pais $pais
 * @property SedeDomicilio[] $sedeDomicilios
 * @property ServicioSaludContacto[] $servicioSaludContactos
 */
class Provincia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provincia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pais_id', 'nombre'], 'required'],
            [['pais_id'], 'integer'],
            [['nombre'], 'string', 'max' => 60],
            [['pais_id', 'nombre'], 'unique', 'targetAttribute' => ['pais_id', 'nombre'], 'message' => 'The combination of Pais ID and Nombre has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pais_id' => Yii::t('app', 'Pais ID'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudads()
    {
        return $this->hasMany(Ciudad::className(), ['provincia_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstablecimientoProcedencias()
    {
        return $this->hasMany(EstablecimientoProcedencia::className(), ['provincia_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaDomicilios()
    {
        return $this->hasMany(PersonaDomicilio::className(), ['provincia_id' => 'id']);
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
    public function getSedeDomicilios()
    {
        return $this->hasMany(SedeDomicilio::className(), ['provincia_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioSaludContactos()
    {
        return $this->hasMany(ServicioSaludContacto::className(), ['provincia_id' => 'id']);
    }
}
