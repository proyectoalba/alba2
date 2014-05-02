<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ServicioSaludContacto;

/**
 * ServicioSaludContactoSearch represents the model behind the search form about `app\models\ServicioSaludContacto`.
 */
class ServicioSaludContactoSearch extends ServicioSaludContacto
{
    public function rules()
    {
        return [
            [['id', 'servicio_salud_id', 'pais_id', 'provincia_id', 'ciudad_id', 'contacto_preferido'], 'integer'],
            [['direccion', 'cp', 'telefono', 'telefono_alternativo', 'observaciones'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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

        $query->andFilterWhere([
            'id' => $this->id,
            'servicio_salud_id' => $this->servicio_salud_id,
            'pais_id' => $this->pais_id,
            'provincia_id' => $this->provincia_id,
            'ciudad_id' => $this->ciudad_id,
            'contacto_preferido' => $this->contacto_preferido,
        ]);

        $query->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'cp', $this->cp])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'telefono_alternativo', $this->telefono_alternativo])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
