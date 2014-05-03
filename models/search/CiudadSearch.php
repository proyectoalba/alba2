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
    public $pais_nombre;
    public $provincia_nombre;

    public function rules()
    {
        return [
            [['id', 'provincia_id'], 'integer'],
            [['nombre', 'pais_nombre', 'provincia_nombre'], 'safe'],
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
                'pais_nombre' => [
                     'asc' => ['pais.nombre' => SORT_ASC],
                     'desc' => ['pais.nombre' => SORT_DESC],
                     'default' => SORT_ASC,
                     'label' => Yii::t('app', 'País'),
                 ],
                'provincia_nombre' => [
                     'asc' => ['provincia.nombre' => SORT_ASC],
                     'desc' => ['provincia.nombre' => SORT_DESC],
                     'default' => SORT_ASC,
                     'label' => Yii::t('app', 'Provincia'),
                 ],
             ]            
        );

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'pais.nombre', $this->pais_nombre])
            ->andFilterWhere(['like', 'pais.nombre', $this->pais_nombre])
            ->andFilterWhere(['like', 'provincia.nombre', $this->provincia_nombre]);

        return $dataProvider;
    }
}
