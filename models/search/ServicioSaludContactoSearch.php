<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ServicioSaludContacto;

/**
 * ServicioSaludContactoSearch represents the model behind the search form about ServicioSaludContacto.
 */
class ServicioSaludContactoSearch extends Model
{
	public $id;
	public $servicio_salud_id;
	public $direccion;
	public $cp;
	public $pais_id;
	public $provincia_id;
	public $ciudad_id;
	public $telefono;
	public $telefono_alternativo;
	public $contacto_preferido;
	public $observaciones;

	public function rules()
	{
		return [
			[['id', 'servicio_salud_id', 'pais_id', 'provincia_id', 'ciudad_id'], 'integer'],
			[['direccion', 'cp', 'telefono', 'telefono_alternativo', 'observaciones'], 'safe'],
			[['contacto_preferido'], 'boolean'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'servicio_salud_id' => 'Servicio Salud ID',
			'direccion' => 'Direccion',
			'cp' => 'Cp',
			'pais_id' => 'Pais ID',
			'provincia_id' => 'Provincia ID',
			'ciudad_id' => 'Ciudad ID',
			'telefono' => 'Telefono',
			'telefono_alternativo' => 'Telefono Alternativo',
			'contacto_preferido' => 'Contacto Preferido',
			'observaciones' => 'Observaciones',
		];
	}

	public function search($params)
	{
		$query = ServicioSaludContacto::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'servicio_salud_id');
		$this->addCondition($query, 'direccion', true);
		$this->addCondition($query, 'cp', true);
		$this->addCondition($query, 'pais_id');
		$this->addCondition($query, 'provincia_id');
		$this->addCondition($query, 'ciudad_id');
		$this->addCondition($query, 'telefono', true);
		$this->addCondition($query, 'telefono_alternativo', true);
		$this->addCondition($query, 'contacto_preferido');
		$this->addCondition($query, 'observaciones', true);
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
