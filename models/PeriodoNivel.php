<?php

namespace app\models;

/**
 * This is the model class for table "periodo_nivel".
 *
 * @property integer $id
 */
class PeriodoNivel extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'periodo_nivel';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
		];
	}
}
