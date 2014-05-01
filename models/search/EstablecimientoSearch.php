<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Establecimiento;

/**
 * EstablecimientoSearch represents the model behind the search form about `app\models\Establecimiento`.
 */
class EstablecimientoSearch extends Establecimiento
{
    public function rules()
    {
        return [
            [['id', 'dependencia_organizativa_id'], 'integer'],
            [['nombre', 'codigo', 'numero', 'telefono', 'telefono_alternativo', 'fax', 'email', 'sitio_web'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Establecimiento::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'dependencia_organizativa_id' => $this->dependencia_organizativa_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'telefono_alternativo', $this->telefono_alternativo])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'sitio_web', $this->sitio_web]);

        return $dataProvider;
    }
}
