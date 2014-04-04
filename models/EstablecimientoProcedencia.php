<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "establecimiento_procedencia".
 *
 * @property integer $id
 * @property integer $inscripcion_id
 * @property string $nombre
 * @property integer $nivel_id
 * @property integer $tipo_gestion_id
 * @property integer $pais_id
 * @property integer $provincia_id
 * @property integer $ciudad_id
 * @property integer $establecimiento_id
 *
 * @property Ciudad $ciudad
 * @property Establecimiento $establecimiento
 * @property Inscripcion $inscripcion
 * @property Nivel $nivel
 * @property Pais $pais
 * @property Provincia $provincia
 * @property TipoGestion $tipoGestion
 */
class EstablecimientoProcedencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'establecimiento_procedencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inscripcion_id', 'nombre'], 'required'],
            [['inscripcion_id', 'nivel_id', 'tipo_gestion_id', 'pais_id', 'provincia_id', 'ciudad_id', 'establecimiento_id'], 'integer'],
            [['nombre'], 'string', 'max' => 45]
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
            'nombre' => Yii::t('app', 'Nombre'),
            'nivel_id' => Yii::t('app', 'Nivel ID'),
            'tipo_gestion_id' => Yii::t('app', 'Tipo Gestion ID'),
            'pais_id' => Yii::t('app', 'Pais ID'),
            'provincia_id' => Yii::t('app', 'Provincia ID'),
            'ciudad_id' => Yii::t('app', 'Ciudad ID'),
            'establecimiento_id' => Yii::t('app', 'Establecimiento ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudad()
    {
        return $this->hasOne(Ciudad::className(), ['id' => 'ciudad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstablecimiento()
    {
        return $this->hasOne(Establecimiento::className(), ['id' => 'establecimiento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcion()
    {
        return $this->hasOne(Inscripcion::className(), ['id' => 'inscripcion_id']);
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
    public function getPais()
    {
        return $this->hasOne(Pais::className(), ['id' => 'pais_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincia()
    {
        return $this->hasOne(Provincia::className(), ['id' => 'provincia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoGestion()
    {
        return $this->hasOne(TipoGestion::className(), ['id' => 'tipo_gestion_id']);
    }
}
