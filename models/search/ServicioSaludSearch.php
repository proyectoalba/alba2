<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ServicioSalud;

/**
 * ServicioSaludSearch represents the model behind the search form about `app\models\ServicioSalud`.
 */
class ServicioSaludSearch extends ServicioSalud
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['codigo', 'abreviatura', 'nombre', 'email', 'sitio_web'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'abreviatura', $this->abreviatura])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'sitio_web', $this->sitio_web]);

        return $dataProvider;
    }
}
