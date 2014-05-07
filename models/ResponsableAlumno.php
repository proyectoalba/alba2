<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "responsable_alumno".
 *
 * @property integer $id
 * @property integer $responsable_id
 * @property integer $alumno_id
 *
 * @property Responsable $responsable
 * @property Alumno $alumno
 */
class ResponsableAlumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'responsable_alumno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['responsable_id', 'alumno_id'], 'required'],
            [['responsable_id', 'alumno_id'], 'integer'],
            [['responsable_id', 'alumno_id'], 'unique', 'targetAttribute' => ['responsable_id', 'alumno_id'], 'message' => 'The combination of Responsable ID and Alumno ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'responsable_id' => Yii::t('app', 'Responsable ID'),
            'alumno_id' => Yii::t('app', 'Alumno ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsable()
    {
        return $this->hasOne(Responsable::className(), ['id' => 'responsable_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['id' => 'alumno_id']);
    }
}
