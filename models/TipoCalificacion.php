<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_calificacion".
 *
 * @property integer $id
 * @property string $descripcion
 * @property double $valor_probacion
 *
 * @property ConfiguracionPlanEstudio[] $configuracionPlanEstudios
 * @property ValorCalificacion[] $valorCalificacions
 */
class TipoCalificacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_calificacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['valor_probacion'], 'number'],
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
            'valor_probacion' => Yii::t('app', 'Valor Probacion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfiguracionPlanEstudios()
    {
        return $this->hasMany(ConfiguracionPlanEstudio::className(), ['tipo_calificacion_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValorCalificacions()
    {
        return $this->hasMany(ValorCalificacion::className(), ['tipo_calificacion_id' => 'id']);
    }
}
