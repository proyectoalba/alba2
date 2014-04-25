<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ficha_alumno".
 *
 * @property integer $id
 * @property integer $alumno_id
 * @property string $codigo
 * @property string $informacion_sensible
 *
 * @property Alumno $alumno
 */
class FichaAlumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ficha_alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alumno_id', 'codigo'], 'required'],
            [['alumno_id'], 'integer'],
            [['informacion_sensible'], 'string'],
            [['codigo'], 'string', 'max' => 255],
            [['alumno_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alumno_id' => Yii::t('app', 'Alumno ID'),
            'codigo' => Yii::t('app', 'Codigo'),
            'informacion_sensible' => Yii::t('app', 'Informacion Sensible'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['id' => 'alumno_id']);
    }
}
