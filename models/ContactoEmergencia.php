<?php

namespace app\models;

/**
 * This is the model class for table "contacto_emergencia".
 *
 * @property integer $id
 * @property integer $ficha_salud_id
 * @property integer $tipo_contacto_id
 * @property string $nombre
 * @property string $domicilio
 * @property string $telefono
 *
 * @property FichaSalud $fichaSalud
 * @property TipoContactoEmergencia $tipoContacto
 */
class ContactoEmergencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacto_emergencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ficha_salud_id', 'tipo_contacto_id', 'nombre'], 'required'],
            [['ficha_salud_id', 'tipo_contacto_id'], 'integer'],
            [['nombre', 'telefono'], 'string', 'max' => 45],
            [['domicilio'], 'string', 'max' => 99]
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
            'tipo_contacto_id' => Yii::t('app', 'Tipo Contacto ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'domicilio' => Yii::t('app', 'Domicilio'),
            'telefono' => Yii::t('app', 'Telefono'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichaSalud()
    {
        return $this->hasOne(FichaSalud::className(), ['id' => 'ficha_salud_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoContacto()
    {
        return $this->hasOne(TipoContactoEmergencia::className(), ['id' => 'tipo_contacto_id']);
    }
}
