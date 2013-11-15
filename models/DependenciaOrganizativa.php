<?php

namespace app\models;

/**
 * This is the model class for table "dependencia_organizativa".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $dependencia_padre_id
 *
 * @property DependenciaOrganizativa $dependenciaPadre
 * @property DependenciaOrganizativa[] $dependenciaOrganizativas
 * @property Establecimiento[] $establecimientos
 */
class DependenciaOrganizativa extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'dependencia_organizativa';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['nombre', 'required'],
			['dependencia_padre_id', 'integer'],
			['nombre', 'string', 'max' => 99]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'nombre' => 'Nombre',
			'dependencia_padre_id' => 'Dependencia Padre ID',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDependenciaPadre()
	{
		return $this->hasOne(DependenciaOrganizativa::className(), ['id' => 'dependencia_padre_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDependenciaOrganizativas()
	{
		return $this->hasMany(DependenciaOrganizativa::className(), ['dependencia_padre_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEstablecimientos()
	{
		return $this->hasMany(Establecimiento::className(), ['dependencia_organizativa_id' => 'id']);
	}
}
