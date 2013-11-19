<?php

namespace app\models;

/**
 * This is the model class for table "asignaturas_areas".
 *
 * @property integer $id
 * @property integer $area_asignatura_id
 * @property integer $asignatura_id
 *
 * @property AreaAsignatura $areaAsignatura
 * @property Asignatura $asignatura
 */
class AsignaturasAreas extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'asignaturas_areas';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['id', 'area_asignatura_id', 'asignatura_id'], 'required'],
			[['id', 'area_asignatura_id', 'asignatura_id'], 'integer']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'area_asignatura_id' => 'Area Asignatura ID',
			'asignatura_id' => 'Asignatura ID',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getAreaAsignatura()
	{
		return $this->hasOne(AreaAsignatura::className(), ['id' => 'area_asignatura_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getAsignatura()
	{
		return $this->hasOne(Asignatura::className(), ['id' => 'asignatura_id']);
	}
}
