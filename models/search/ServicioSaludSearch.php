<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ServicioSalud;

/**
 * ServicioSaludSearch represents the model behind the search form about ServicioSalud.
 */
class ServicioSaludSearch extends Model
{
	public $id;
	public $codigo;
	public $abreviatura;
	public $nombre;
	public $email;
	public $sitio_web;

	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['codigo', 'abreviatura', 'nombre', 'email', 'sitio_web'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'codigo' => 'Codigo',
			'abreviatura' => 'Abreviatura',
			'nombre' => 'Nombre',
			'email' => 'Email',
			'sitio_web' => 'Sitio Web',
		];
	}

	public function search($params)
	{
		$query = ServicioSalud::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'codigo', true);
		$this->addCondition($query, 'abreviatura', true);
		$this->addCondition($query, 'nombre', true);
		$this->addCondition($query, 'email', true);
		$this->addCondition($query, 'sitio_web', true);
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
