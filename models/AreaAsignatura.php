<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area_asignatura".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $nivel_id
 *
 * @property Nivel $nivel
 * @property Asignatura[] $asignaturas
 */
class AreaAsignatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area_asignatura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['nivel_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 45]
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
            'nivel_id' => Yii::t('app', 'Nivel ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNivel()
    {
        return $this->hasOne(Nivel::className(), ['id' => 'nivel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturas()
    {
        return $this->hasMany(Asignatura::className(), ['area_id' => 'id']);
    }
}
