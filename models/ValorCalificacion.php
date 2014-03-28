<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "valor_calificacion".
 *
 * @property integer $id
 * @property integer $tipo_calificacion_id
 * @property string $descripcion
 * @property double $valor_numerico
 * @property integer $orden
 *
 * @property Calificacion[] $calificacions
 * @property TipoCalificacion $tipoCalificacion
 */
class ValorCalificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'valor_calificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_calificacion_id', 'descripcion', 'valor_numerico'], 'required'],
            [['tipo_calificacion_id', 'orden'], 'integer'],
            [['valor_numerico'], 'number'],
            [['descripcion'], 'string', 'max' => 45],
            [['tipo_calificacion_id', 'descripcion'], 'unique', 'targetAttribute' => ['tipo_calificacion_id', 'descripcion'], 'message' => 'The combination of Tipo Calificacion ID and Descripcion has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tipo_calificacion_id' => Yii::t('app', 'Tipo Calificacion ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'valor_numerico' => Yii::t('app', 'Valor Numerico'),
            'orden' => Yii::t('app', 'Orden'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalificacions()
    {
        return $this->hasMany(Calificacion::className(), ['valor_calificacion_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoCalificacion()
    {
        return $this->hasOne(TipoCalificacion::className(), ['id' => 'tipo_calificacion_id']);
    }
}
