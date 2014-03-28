<?php

namespace app\models;

/**
 * This is the model class for table "actividad_responsable".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property ResponsableAlumno[] $responsableAlumnos
 */
class ActividadResponsable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actividad_responsable';
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
    public function getResponsableAlumnos()
    {
        return $this->hasMany(ResponsableAlumno::className(), ['actividad_id' => 'id']);
    }
}
