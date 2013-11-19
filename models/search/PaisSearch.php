<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pais;

/**
 * PaisSearch represents the model behind the search form about Pais.
 */
class PaisSearch extends Model
{
	public $id;
	public $nombre;
	public $codigo;

	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['nombre', 'codigo'], 'safe'],
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
			'codigo' => 'Codigo',
		];
	}

	public function search($params)
	{
		$query = Pais::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'nombre', true);
		$this->addCondition($query, 'codigo', true);
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
