<?php

namespace app\models;

/**
 * This is the model class for table "docente_estado".
 *
 * @property integer $id
 * @property integer $estado_id
 * @property integer $docente_id
 * @property string $fecha
 *
 * @property Docente $docente
 * @property EstadoDocente $estado
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
            [['estado_id', 'docente_id'], 'required'],
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
            'id' => 'ID',
            'estado_id' => 'Estado ID',
            'docente_id' => 'Docente ID',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocente()
    {
        return $this->hasOne(Docente::className(), ['id' => 'docente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(EstadoDocente::className(), ['id' => 'estado_id']);
    }
}
