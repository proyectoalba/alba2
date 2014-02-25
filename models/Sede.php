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
 * @property integer $principal
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
			[['establecimiento_id', 'codigo', 'nombre'], 'required'],
			[['establecimiento_id', 'principal'], 'integer'],
			[['codigo', 'nombre'], 'string', 'max' => 99],
			[['telefono', 'telefono_alternativo', 'fax'], 'string', 'max' => 60],
			[['establecimiento_id', 'nombre'], 'unique', 'targetAttribute' => ['establecimiento_id', 'nombre'], 'message' => 'The combination of Establecimiento ID and Nombre has already been taken.'],
			[['codigo'], 'unique']
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
	 * @return \yii\db\ActiveQuery
	 */
	public function getInscripcions()
	{
		return $this->hasMany(Inscripcion::className(), ['sede_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSeccions()
	{
		return $this->hasMany(Seccion::className(), ['sede_id' => 'id']);
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
	public function getSedeDomicilios()
	{
		return $this->hasMany(SedeDomicilio::className(), ['sede_id' => 'id']);
	}
}
