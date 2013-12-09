<?php

namespace app\models;

/**
 * This is the model class for table "tipo_designacion_docente".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property DesignacionDocente[] $designacionDocentes
 */
class TipoDesignacionDocente extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tipo_designacion_docente';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['descripcion'], 'required'],
			[['descripcion'], 'string', 'max' => 45]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'descripcion' => 'Descripcion',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDesignacionDocentes()
	{
		return $this->hasMany(DesignacionDocente::className(), ['tipo_designacion_id' => 'id']);
	}
}
