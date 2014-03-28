<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inscripcion_informacion_adicional".
 *
 * @property integer $id
 * @property integer $inscripcion_id
 * @property integer $cantidad_hermanos
 * @property integer $hermanos_en_establecimiento
 * @property string $distancia_establecimiento
 * @property integer $habitantes_hogar
 *
 * @property Inscripcion $inscripcion
 */
class InscripcionInformacionAdicional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inscripcion_informacion_adicional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inscripcion_id'], 'required'],
            [['inscripcion_id', 'cantidad_hermanos', 'hermanos_en_establecimiento', 'habitantes_hogar'], 'integer'],
            [['distancia_establecimiento'], 'string', 'max' => 45],
            [['inscripcion_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'inscripcion_id' => Yii::t('app', 'Inscripcion ID'),
            'cantidad_hermanos' => Yii::t('app', 'Cantidad Hermanos'),
            'hermanos_en_establecimiento' => Yii::t('app', 'Hermanos En Establecimiento'),
            'distancia_establecimiento' => Yii::t('app', 'Distancia Establecimiento'),
            'habitantes_hogar' => Yii::t('app', 'Habitantes Hogar'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcion()
    {
        return $this->hasOne(Inscripcion::className(), ['id' => 'inscripcion_id']);
    }
}
