<?php

namespace app\models;

/**
 * This is the model class for table "valor_inasistencia".
 *
 * @property integer $id
 * @property integer $tipo_inasistencia_id
 * @property string $descripcion
 * @property string $descripcion_larga
 * @property double $valor_numerico
 * @property integer $orden
 *
 * @property Inasistencia[] $inasistencias
 * @property TipoInasistencia $tipoInasistencia
 */
class ValorInasistencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'valor_inasistencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_inasistencia_id', 'descripcion', 'descripcion_larga', 'valor_numerico'], 'required'],
            [['tipo_inasistencia_id', 'orden'], 'integer'],
            [['valor_numerico'], 'number'],
            [['descripcion', 'descripcion_larga'], 'string', 'max' => 45],
            [['tipo_inasistencia_id', 'descripcion'], 'unique', 'targetAttribute' => ['tipo_inasistencia_id', 'descripcion'], 'message' => 'The combination of Tipo Inasistencia ID and Descripcion has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tipo_inasistencia_id' => Yii::t('app', 'Tipo Inasistencia ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'descripcion_larga' => Yii::t('app', 'Descripcion Larga'),
            'valor_numerico' => Yii::t('app', 'Valor Numerico'),
            'orden' => Yii::t('app', 'Orden'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInasistencias()
    {
        return $this->hasMany(Inasistencia::className(), ['valor_inasistencia_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoInasistencia()
    {
        return $this->hasOne(TipoInasistencia::className(), ['id' => 'tipo_inasistencia_id']);
    }
}
