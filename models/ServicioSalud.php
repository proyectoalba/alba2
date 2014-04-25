<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "servicio_salud".
 *
 * @property integer $id
 * @property string $codigo
 * @property string $abreviatura
 * @property string $nombre
 * @property string $telefono
 * @property string $telefono_alternativo
 * @property string $email
 * @property string $sitio_web
 * @property string $observaciones
 *
 * @property FichaSalud[] $fichaSaluds
 * @property ServicioSaludDomicilio[] $servicioSaludDomicilios
 */
class ServicioSalud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'servicio_salud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'abreviatura', 'nombre', 'telefono'], 'required'],
            [['codigo', 'abreviatura'], 'string', 'max' => 30],
            [['nombre', 'observaciones'], 'string', 'max' => 255],
            [['telefono', 'telefono_alternativo'], 'string', 'max' => 60],
            [['email', 'sitio_web'], 'string', 'max' => 99],
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
            'codigo' => Yii::t('app', 'Codigo'),
            'abreviatura' => Yii::t('app', 'Abreviatura'),
            'nombre' => Yii::t('app', 'Nombre'),
            'telefono' => Yii::t('app', 'Telefono'),
            'telefono_alternativo' => Yii::t('app', 'Telefono Alternativo'),
            'email' => Yii::t('app', 'Email'),
            'sitio_web' => Yii::t('app', 'Sitio Web'),
            'observaciones' => Yii::t('app', 'Observaciones'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichaSaluds()
    {
        return $this->hasMany(FichaSalud::className(), ['servicio_salud_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioSaludDomicilios()
    {
        return $this->hasMany(ServicioSaludDomicilio::className(), ['servicio_salud_id' => 'id']);
    }
}
