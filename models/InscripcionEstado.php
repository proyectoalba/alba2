<?php

namespace app\models;

/**
 * This is the model class for table "inscripcion_estado".
 *
 * @property integer $id
 * @property integer $inscripcion_id
 * @property integer $estado_id
 * @property string $fecha
 *
 * @property EstadoInscripcion $estado
 * @property Inscripcion $inscripcion
 */
class InscripcionEstado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inscripcion_estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inscripcion_id', 'estado_id'], 'required'],
            [['inscripcion_id', 'estado_id'], 'integer'],
            [['fecha'], 'safe']
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
            'estado_id' => Yii::t('app', 'Estado ID'),
            'fecha' => Yii::t('app', 'Fecha'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(EstadoInscripcion::className(), ['id' => 'estado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcion()
    {
        return $this->hasOne(Inscripcion::className(), ['id' => 'inscripcion_id']);
    }
}
