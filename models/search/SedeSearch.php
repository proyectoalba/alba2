<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sede;

/**
 * SedeSearch represents the model behind the search form about `app\models\Sede`.
 */
class SedeSearch extends Sede
{
    public function rules()
    {
        return [
            [['id', 'establecimiento_id', 'principal'], 'integer'],
            [['codigo', 'nombre', 'telefono', 'telefono_alternativo', 'fax'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Sede::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'establecimiento_id' => $this->establecimiento_id,
            'principal' => $this->principal,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'telefono_alternativo', $this->telefono_alternativo])
            ->andFilterWhere(['like', 'fax', $this->fax]);

        return $dataProvider;
    }
}
