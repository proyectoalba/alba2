<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicio_salud_contacto".
 *
 * @property integer $id
 * @property integer $servicio_salud_id
 * @property string $direccion
 * @property string $cp
 * @property integer $pais_id
 * @property integer $provincia_id
 * @property integer $ciudad_id
 * @property string $telefono
 * @property string $telefono_alternativo
 * @property integer $contacto_preferido
 * @property string $observaciones
 *
 * @property Ciudad $ciudad
 * @property Pais $pais
 * @property Provincia $provincia
 * @property ServicioSalud $servicioSalud
 */
class ServicioSaludContacto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servicio_salud_contacto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['servicio_salud_id', 'direccion', 'telefono'], 'required'],
            [['servicio_salud_id', 'pais_id', 'provincia_id', 'ciudad_id', 'contacto_preferido'], 'integer'],
            [['direccion'], 'string', 'max' => 99],
            [['cp'], 'string', 'max' => 30],
            [['telefono', 'telefono_alternativo'], 'string', 'max' => 60],
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
            'servicio_salud_id' => Yii::t('app', 'Servicio Salud ID'),
            'direccion' => Yii::t('app', 'Direccion'),
            'cp' => Yii::t('app', 'Cp'),
            'pais_id' => Yii::t('app', 'Pais ID'),
            'provincia_id' => Yii::t('app', 'Provincia ID'),
            'ciudad_id' => Yii::t('app', 'Ciudad ID'),
            'telefono' => Yii::t('app', 'Telefono'),
            'telefono_alternativo' => Yii::t('app', 'Telefono Alternativo'),
            'contacto_preferido' => Yii::t('app', 'Contacto Preferido'),
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
    public function getServicioSalud()
    {
        return $this->hasOne(ServicioSalud::className(), ['id' => 'servicio_salud_id']);
    }
}
