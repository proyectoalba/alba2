<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacto_emergencia".
 *
 * @property integer $id
 * @property integer $alumno_id
 * @property integer $tipo_contacto_emergencia_id
 * @property string $nombre
 * @property string $domicilio
 * @property string $telefono
 *
 * @property TipoContactoEmergencia $tipoContactoEmergencia
 * @property Alumno $alumno
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
            [['alumno_id', 'tipo_contacto_emergencia_id', 'nombre'], 'required'],
            [['alumno_id', 'tipo_contacto_emergencia_id'], 'integer'],
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
            'alumno_id' => Yii::t('app', 'Alumno ID'),
            'tipo_contacto_emergencia_id' => Yii::t('app', 'Tipo Contacto Emergencia ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'domicilio' => Yii::t('app', 'Domicilio'),
            'telefono' => Yii::t('app', 'Telefono'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoContactoEmergencia()
    {
        return $this->hasOne(TipoContactoEmergencia::className(), ['id' => 'tipo_contacto_emergencia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['id' => 'alumno_id']);
    }
}
