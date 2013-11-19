<?php

namespace app\models;

/**
 * This is the model class for table "area_asignatura".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $nivel_id
 *
 * @property Nivel $nivel
 * @property AsignaturasAreas[] $asignaturasAreas
 */
class AreaAsignatura extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'area_asignatura';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id', 'descripcion'], 'required'],
			[['id', 'nivel_id'], 'integer'],
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
			'nivel_id' => 'Nivel ID',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getNivel()
	{
		return $this->hasOne(Nivel::className(), ['id' => 'nivel_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getAsignaturasAreas()
	{
		return $this->hasMany(AsignaturasAreas::className(), ['area_asignatura_id' => 'id']);
	}
}
