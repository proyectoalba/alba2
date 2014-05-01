<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Provincia;

/**
 * ProvinciaSearch represents the model behind the search form about `app\models\Provincia`.
 */
class ProvinciaSearch extends Provincia
{
    public function rules()
    {
        return [
            [['id', 'pais_id'], 'integer'],
            [['nombre'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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

        $query->andFilterWhere([
            'pais_id' => $this->pais_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
