<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_vacunacion".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property FichaSalud[] $fichaSaluds
 */
class EstadoVacunacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_vacunacion';
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
    public function getFichaSaluds()
    {
        return $this->hasMany(FichaSalud::className(), ['estado_vacunacion_id' => 'id']);
    }
}
