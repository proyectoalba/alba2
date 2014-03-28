<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ciudad".
 *
 * @property integer $id
 * @property integer $provincia_id
 * @property string $nombre
 *
 * @property Provincia $provincia
 * @property EstablecimientoProcedencia[] $establecimientoProcedencias
 * @property PersonaDomicilio[] $personaDomicilios
 * @property SedeDomicilio[] $sedeDomicilios
 * @property ServicioSaludContacto[] $servicioSaludContactos
 */
class Ciudad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ciudad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provincia_id', 'nombre'], 'required'],
            [['provincia_id'], 'integer'],
            [['nombre'], 'string', 'max' => 60],
            [['provincia_id', 'nombre'], 'unique', 'targetAttribute' => ['provincia_id', 'nombre'], 'message' => 'The combination of Provincia ID and Nombre has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'provincia_id' => Yii::t('app', 'Provincia ID'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
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
    public function getEstablecimientoProcedencias()
    {
        return $this->hasMany(EstablecimientoProcedencia::className(), ['ciudad_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaDomicilios()
    {
        return $this->hasMany(PersonaDomicilio::className(), ['ciudad_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSedeDomicilios()
    {
        return $this->hasMany(SedeDomicilio::className(), ['ciudad_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioSaludContactos()
    {
        return $this->hasMany(ServicioSaludContacto::className(), ['ciudad_id' => 'id']);
    }
}
