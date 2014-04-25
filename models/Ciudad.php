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
 * @property Domicilio[] $domicilios
 * @property EstablecimientoProcedencia[] $establecimientoProcedencias
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
    public function getDomicilios()
    {
        return $this->hasMany(Domicilio::className(), ['ciudad_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstablecimientoProcedencias()
    {
        return $this->hasMany(EstablecimientoProcedencia::className(), ['ciudad_id' => 'id']);
    }
}
