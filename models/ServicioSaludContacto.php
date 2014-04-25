<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicio_salud_contacto".
 *
 * @property integer $id
 * @property integer $servicio_salud_domicilio_id
 * @property string $telefono
 * @property string $telefono_alternativo
 *
 * @property ServicioSaludDomicilio $servicioSaludDomicilio
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
            [['servicio_salud_domicilio_id', 'telefono'], 'required'],
            [['servicio_salud_domicilio_id'], 'integer'],
            [['telefono', 'telefono_alternativo'], 'string', 'max' => 60],
            [['servicio_salud_domicilio_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'servicio_salud_domicilio_id' => Yii::t('app', 'Servicio Salud Domicilio ID'),
            'telefono' => Yii::t('app', 'Telefono'),
            'telefono_alternativo' => Yii::t('app', 'Telefono Alternativo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioSaludDomicilio()
    {
        return $this->hasOne(ServicioSaludDomicilio::className(), ['id' => 'servicio_salud_domicilio_id']);
    }
}
