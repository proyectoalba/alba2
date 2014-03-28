<?php

namespace app\models;

/**
 * This is the model class for table "establecimiento".
 *
 * @property integer $id
 * @property integer $tipo_gestion_id
 * @property string $codigo
 * @property string $nombre
 * @property string $numero
 * @property string $telefono
 * @property string $telefono_alternativo
 * @property string $fax
 * @property string $email
 * @property string $sitio_web
 * @property integer $dependencia_organizativa_id
 *
 * @property DependenciaOrganizativa $dependenciaOrganizativa
 * @property TipoGestion $tipoGestion
 * @property EstablecimientoProcedencia[] $establecimientoProcedencias
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
            [['tipo_gestion_id', 'codigo', 'nombre'], 'required'],
            [['tipo_gestion_id', 'dependencia_organizativa_id'], 'integer'],
            [['codigo', 'nombre', 'email', 'sitio_web'], 'string', 'max' => 99],
            [['numero'], 'string', 'max' => 20],
            [['telefono', 'telefono_alternativo', 'fax'], 'string', 'max' => 60],
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
            'tipo_gestion_id' => Yii::t('app', 'Tipo Gestion ID'),
            'codigo' => Yii::t('app', 'Codigo'),
            'nombre' => Yii::t('app', 'Nombre'),
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
     * @return \yii\db\ActiveQuery
     */
    public function getDependenciaOrganizativa()
    {
        return $this->hasOne(DependenciaOrganizativa::className(), ['id' => 'dependencia_organizativa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoGestion()
    {
        return $this->hasOne(TipoGestion::className(), ['id' => 'tipo_gestion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstablecimientoProcedencias()
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
