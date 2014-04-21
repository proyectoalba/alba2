<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sede".
 *
 * @property integer $id
 * @property integer $establecimiento_id
 * @property string $codigo
 * @property string $nombre
 * @property string $telefono
 * @property string $telefono_alternativo
 * @property string $fax
 * @property integer $principal
 *
 * @property Inscripcion[] $inscripciones
 * @property Seccion[] $secciones
 * @property Establecimiento $establecimiento
 * @property SedeDomicilio[] $domicilios
 */
class Sede extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sede';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['establecimiento_id', 'codigo', 'nombre'], 'required'],
            [['establecimiento_id', 'principal'], 'integer'],
            [['codigo', 'nombre'], 'string', 'max' => 99],
            [['telefono', 'telefono_alternativo', 'fax'], 'string', 'max' => 60],
            [['establecimiento_id', 'nombre'], 'unique', 'targetAttribute' => ['establecimiento_id', 'nombre'], 'message' => 'The combination of Establecimiento ID and Nombre has already been taken.'],
            [['codigo'], 'unique'],
            // Para poder asignarlo a mano
            [['establecimiento_id'], 'safe'],
            // Sólo puede haber una única Sede principal por Establecimiento
            [['principal', 'establecimiento_id'], 'unique', 
                'when' => function ($model) { return $model->principal == true; }, 
                'message' => 'El Establecimiento ya tiene una Sede principal.'
            ],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'establecimiento_id' => Yii::t('app', 'Establecimiento ID'),
            'codigo' => Yii::t('app', 'Codigo'),
            'nombre' => Yii::t('app', 'Nombre'),
            'telefono' => Yii::t('app', 'Telefono'),
            'telefono_alternativo' => Yii::t('app', 'Telefono Alternativo'),
            'fax' => Yii::t('app', 'Fax'),
            'principal' => Yii::t('app', 'Principal'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripciones()
    {
        return $this->hasMany(Inscripcion::className(), ['sede_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecciones()
    {
        return $this->hasMany(Seccion::className(), ['sede_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstablecimiento()
    {
        return $this->hasOne(Establecimiento::className(), ['id' => 'establecimiento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomicilios()
    {
        return $this->hasMany(SedeDomicilio::className(), ['sede_id' => 'id']);
    }
}
