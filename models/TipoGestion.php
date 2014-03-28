<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_gestion".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Establecimiento[] $establecimientos
 * @property EstablecimientoProcedencia[] $establecimientoProcedencias
 */
class TipoGestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_gestion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 45],
            [['descripcion'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstablecimientos()
    {
        return $this->hasMany(Establecimiento::className(), ['tipo_gestion_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstablecimientoProcedencias()
    {
        return $this->hasMany(EstablecimientoProcedencia::className(), ['tipo_gestion_id' => 'id']);
    }
}
