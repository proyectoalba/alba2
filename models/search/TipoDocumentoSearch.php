<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoDocumento;

/**
 * TipoDocumentoSearch represents the model behind the search form about `app\models\TipoDocumento`.
 */
class TipoDocumentoSearch extends TipoDocumento
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['descripcion', 'abreviatura'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = TipoDocumento::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'abreviatura', $this->abreviatura]);

        return $dataProvider;
    }
}
