<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ciudad;

/**
 * CiudadSearch represents the model behind the search form about `app\models\Ciudad`.
 */
class CiudadSearch extends Ciudad
{
    public $pais_id;

    public function rules()
    {
        return [
            [['id', 'provincia_id', 'pais_id'], 'integer'],
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
        $query = Ciudad::find()
            ->joinWith('provincia')
            ->joinWith('pais');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->getSort()->attributes = array_merge(
            $dataProvider->getSort()->attributes,
            [
                'pais_id' => [
                     'asc' => ['pais.nombre' => SORT_ASC],
                     'desc' => ['pais.nombre' => SORT_DESC],
                     'default' => SORT_ASC,
                     'label' => Yii::t('app', 'País'),
                 ],
             ]            
        );

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'provincia_id' => $this->provincia_id,
            'pais.id' => $this->pais_id,
        ]);

        $query->andFilterWhere([
            'like', 'ciudad.nombre', $this->nombre,
        ]);

        return $dataProvider;
    }
}
