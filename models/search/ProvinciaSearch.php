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
    public $pais_nombre;

    public function rules()
    {
        return [
            [['id', 'pais_id'], 'integer'],
            [['nombre', 'pais_nombre'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Provincia::find()->joinWith('pais');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->getSort()->attributes = array_merge(
            $dataProvider->getSort()->attributes,
            [
                'pais_nombre' => [
                     'asc' => ['pais.nombre' => SORT_ASC],
                     'desc' => ['pais.nombre' => SORT_DESC],
                     'label' => Yii::t('app', 'País'),
                 ],
             ]            
        );

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'pais.nombre', $this->pais_nombre]);

        return $dataProvider;
    }
}
