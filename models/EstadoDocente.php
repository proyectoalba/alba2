<?php

namespace app\models;

/**
 * This is the model class for table "estado_docente".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Docente[] $docentes
 * @property DocenteEstado[] $docenteEstados
 */
class EstadoDocente extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'estado_docente';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['descripcion', 'string', 'max' => 45]
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
	public function getDocentes()
	{
		return $this->hasMany(Docente::className(), ['estado_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getDocenteEstados()
	{
		return $this->hasMany(DocenteEstado::className(), ['estado_id' => 'id']);
	}
}
