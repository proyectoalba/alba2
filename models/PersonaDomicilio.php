<?php

namespace app\models;

/**
 * This is the model class for table "persona_domicilio".
 *
 * @property integer $id
 * @property integer $persona_id
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
 * @property Persona $persona
 * @property Provincia $provincia
 */
class PersonaDomicilio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona_domicilio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona_id', 'direccion'], 'required'],
            [['persona_id', 'pais_id', 'provincia_id', 'ciudad_id', 'principal'], 'integer'],
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
            'persona_id' => Yii::t('app', 'Persona ID'),
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
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['id' => 'persona_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincia()
    {
        return $this->hasOne(Provincia::className(), ['id' => 'provincia_id']);
    }
}
