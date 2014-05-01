<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pais;

/**
 * PaisSearch represents the model behind the search form about `app\models\Pais`.
 */
class PaisSearch extends Pais
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombre', 'codigo'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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

        $query->andFilterWhere([
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'codigo', $this->codigo]);

        return $dataProvider;
    }
}
