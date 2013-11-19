<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Provincia;

/**
 * ProvinciaSearch represents the model behind the search form about Provincia.
 */
class ProvinciaSearch extends Model
{
	public $id;
	public $pais_id;
	public $nombre;

	public function rules()
	{
		return [
			[['id', 'pais_id'], 'integer'],
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
			'pais_id' => 'Pais ID',
			'nombre' => 'Nombre',
		];
	}

	public function search($params)
	{
		$query = Provincia::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'pais_id');
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
			$value = '%' . strtr($value, ['%'=>'\%', '_'=>'\_', '\\'=>'\\\\']) . '%';
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}
