<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Domicilio;
use yii\data\Sort;
/**
 * SedeDomicilioSearch represents the model behind the search form about `app\models\SedeDomicilio`.
 */
class SedeDomicilioSearch extends Domicilio
{
    public $sede_id;
    public $pais_nombre;
    public $provincia_nombre;
    public $ciudad_nombre;

    public function rules()
    {
        return [
            [['id', 'principal'], 'integer'],
            [['direccion', 'cp', 'pais_nombre', 'provincia_nombre', 'ciudad_nombre'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Domicilio::find()
            ->innerJoinWith('sede')
            ->joinWith('pais')
            ->joinWith('provincia')
            ->joinWith('ciudad')
            ->andWhere(['sede.id' => $params['sede_id']]);
            
        ;
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
                'provincia_nombre' => [
                     'asc' => ['provincia.nombre' => SORT_ASC],
                     'desc' => ['provincia.nombre' => SORT_DESC],
                     'label' => Yii::t('app', 'Provincia'),
                 ],
                'ciudad_nombre' => [
                     'asc' => ['ciudad.nombre' => SORT_ASC],
                     'desc' => ['ciudad.nombre' => SORT_DESC],
                     'label' => Yii::t('app', 'Ciudad'),
                 ],
             ]            
        );

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'domicilio.principal' => $this->principal,
        ]);

        $query->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'cp', $this->cp])
            ->andFilterWhere(['like', 'pais.nombre', $this->pais_nombre])
            ->andFilterWhere(['like', 'provincia.nombre', $this->provincia_nombre])
            ->andFilterWhere(['like', 'ciudad.nombre', $this->ciudad_nombre]);

        return $dataProvider;
    }
}
