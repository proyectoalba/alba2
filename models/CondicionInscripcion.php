<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "condicion_inscripcion".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Inscripcion[] $inscripcions
 */
class CondicionInscripcion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'condicion_inscripcion';
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
    public function getInscripcions()
    {
        return $this->hasMany(Inscripcion::className(), ['condicion_id' => 'id']);
    }
}
