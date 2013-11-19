<?php

namespace app\models;

/**
 * This is the model class for table "sede".
 *
 * @property integer $id
 * @property integer $establecimiento_id
 * @property string $codigo
 * @property string $nombre
 * @property string $telefono
 * @property string $telefono_alternativo
 * @property string $fax
 * @property boolean $principal
 *
 * @property Inscripcion[] $inscripcions
 * @property Seccion[] $seccions
 * @property Establecimiento $establecimiento
 * @property SedeDomicilio[] $sedeDomicilios
 */
class Sede extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'sede';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['establecimiento_id', 'nombre'], 'required'],
			[['establecimiento_id'], 'integer'],
			[['principal'], 'boolean'],
			[['codigo', 'nombre'], 'string', 'max' => 99],
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
			'establecimiento_id' => 'Establecimiento ID',
			'codigo' => 'Codigo',
			'nombre' => 'Nombre',
			'telefono' => 'Telefono',
			'telefono_alternativo' => 'Telefono Alternativo',
			'fax' => 'Fax',
			'principal' => 'Principal',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getInscripcions()
	{
		return $this->hasMany(Inscripcion::className(), ['sede_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getSeccions()
	{
		return $this->hasMany(Seccion::className(), ['sede_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEstablecimiento()
	{
		return $this->hasOne(Establecimiento::className(), ['id' => 'establecimiento_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getSedeDomicilios()
	{
		return $this->hasMany(SedeDomicilio::className(), ['sede_id' => 'id']);
	}
}
