<?php

namespace app\models;

/**
 * This is the model class for table "asignatura".
 *
 * @property integer $id
 * @property string $codigo
 * @property string $nombre
 * @property string $nombre_corto
 * @property integer $area_id
 *
 * @property AreaAsignatura $area
 * @property AsignaturaPlanEstudio[] $asignaturaPlanEstudios
 */
class Asignatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asignatura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'nombre', 'nombre_corto'], 'required'],
            [['area_id'], 'integer'],
            [['codigo', 'nombre_corto'], 'string', 'max' => 45],
            [['nombre'], 'string', 'max' => 99],
            [['codigo'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'codigo' => Yii::t('app', 'Codigo'),
            'nombre' => Yii::t('app', 'Nombre'),
            'nombre_corto' => Yii::t('app', 'Nombre Corto'),
            'area_id' => Yii::t('app', 'Area ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(AreaAsignatura::className(), ['id' => 'area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturaPlanEstudios()
    {
        return $this->hasMany(AsignaturaPlanEstudio::className(), ['asignatura_id' => 'id']);
    }
}
