<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "docente_estado".
 *
 * @property integer $id
 * @property integer $estado_id
 * @property integer $docente_id
 * @property string $fecha
 *
 * @property EstadoDocente $estado
 * @property Docente $docente
 */
class DocenteEstado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docente_estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado_id', 'docente_id', 'fecha'], 'required'],
            [['estado_id', 'docente_id'], 'integer'],
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
            'estado_id' => Yii::t('app', 'Estado ID'),
            'docente_id' => Yii::t('app', 'Docente ID'),
            'fecha' => Yii::t('app', 'Fecha'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(EstadoDocente::className(), ['id' => 'estado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocente()
    {
        return $this->hasOne(Docente::className(), ['id' => 'docente_id']);
    }
}
