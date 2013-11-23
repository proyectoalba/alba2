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
 * @property TipoGestion $tipoGestion
 * @property DependenciaOrganizativa $dependenciaOrganizativa
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
			[['tipo_gestion_id', 'nombre', 'dependencia_organizativa_id'], 'required'],
			[['tipo_gestion_id', 'dependencia_organizativa_id'], 'integer'],
			[['codigo', 'nombre', 'email', 'sitio_web'], 'string', 'max' => 99],
			[['numero'], 'string', 'max' => 20],
			[['telefono', 'telefono_alternativo', 'fax'], 'string', 'max' => 60]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'tipo_gestion_id' => 'Tipo Gestion ID',
			'codigo' => 'Codigo',
			'nombre' => 'Nombre',
			'numero' => 'Numero',
			'telefono' => 'Telefono',
			'telefono_alternativo' => 'Telefono Alternativo',
			'fax' => 'Fax',
			'email' => 'Email',
			'sitio_web' => 'Sitio Web',
			'dependencia_organizativa_id' => 'Dependencia Organizativa ID',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getTipoGestion()
	{
		return $this->hasOne(TipoGestion::className(), ['id' => 'tipo_gestion_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDependenciaOrganizativa()
	{
		return $this->hasOne(DependenciaOrganizativa::className(), ['id' => 'dependencia_organizativa_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getSedes()
	{
		return $this->hasMany(Sede::className(), ['establecimiento_id' => 'id']);
	}
}
