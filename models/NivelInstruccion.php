<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nivel_instruccion".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property ResponsableAlumno[] $responsableAlumnos
 */
class NivelInstruccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nivel_instruccion';
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
        return $this->hasMany(ResponsableAlumno::className(), ['nivel_instruccion_id' => 'id']);
    }
}
