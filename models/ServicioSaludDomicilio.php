<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicio_salud_domicilio".
 *
 * @property integer $id
 * @property integer $servicio_salud_id
 * @property integer $domicilio_id
 *
 * @property ServicioSaludContacto[] $servicioSaludContactos
 * @property ServicioSalud $servicioSalud
 * @property Domicilio $domicilio
 */
class ServicioSaludDomicilio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servicio_salud_domicilio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['servicio_salud_id', 'domicilio_id'], 'required'],
            [['servicio_salud_id', 'domicilio_id'], 'integer'],
            [['servicio_salud_id', 'domicilio_id'], 'unique', 'targetAttribute' => ['servicio_salud_id', 'domicilio_id'], 'message' => 'The combination of Servicio Salud ID and Domicilio ID has already been taken.']
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
            'domicilio_id' => Yii::t('app', 'Domicilio ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioSaludContactos()
    {
        return $this->hasMany(ServicioSaludContacto::className(), ['servicio_salud_domicilio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioSalud()
    {
        return $this->hasOne(ServicioSalud::className(), ['id' => 'servicio_salud_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomicilio()
    {
        return $this->hasOne(Domicilio::className(), ['id' => 'domicilio_id']);
    }
}
