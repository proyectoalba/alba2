<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "establecimiento".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $codigo
 * @property string $numero
 * @property string $telefono
 * @property string $telefono_alternativo
 * @property string $fax
 * @property string $email
 * @property string $sitio_web
 * @property integer $dependencia_organizativa_id
 *
 * @property DependenciaOrganizativa $dependenciaOrganizativa
 * @property EstablecimientoProcedencia[] $establecimientosProcedencia
 * @property Sede[] $sedes
 */
class Establecimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'establecimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'codigo'], 'required'],
            [['dependencia_organizativa_id'], 'integer'],
            [['nombre', 'codigo', 'email', 'sitio_web'], 'string', 'max' => 99],
            [['numero'], 'string', 'max' => 20],
            [['telefono', 'telefono_alternativo', 'fax'], 'string', 'max' => 60],
            [['codigo'], 'unique'],
            //
            [['email'], 'email'],
            [['sitio_web'], 'url'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'codigo' => Yii::t('app', 'Codigo'),
            'numero' => Yii::t('app', 'Numero'),
            'telefono' => Yii::t('app', 'Telefono'),
            'telefono_alternativo' => Yii::t('app', 'Telefono Alternativo'),
            'fax' => Yii::t('app', 'Fax'),
            'email' => Yii::t('app', 'Email'),
            'sitio_web' => Yii::t('app', 'Sitio Web'),
            'dependencia_organizativa_id' => Yii::t('app', 'Dependencia Organizativa ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return EstablecimientoQuery
     */
    public static function find()
    {
        return new EstablecimientoQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDependenciaOrganizativa()
    {
        return $this->hasOne(DependenciaOrganizativa::className(), ['id' => 'dependencia_organizativa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstablecimientosProcedencia()
    {
        return $this->hasMany(EstablecimientoProcedencia::className(), ['establecimiento_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSedes()
    {
        return $this->hasMany(Sede::className(), ['establecimiento_id' => 'id']);
    }
}
