<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ciudad;

/**
 * CiudadSearch represents the model behind the search form about Ciudad.
 */
class CiudadSearch extends Model
{
	public $id;
	public $provincia_id;
	public $nombre;

	public function rules()
	{
		return [
			[['id', 'provincia_id'], 'integer'],
			[['nombre'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'provincia_id' => 'Provincia ID',
			'nombre' => 'Nombre',
		];
	}

	public function search($params)
	{
		$query = Ciudad::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'provincia_id');
		$this->addCondition($query, 'nombre', true);
		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}
