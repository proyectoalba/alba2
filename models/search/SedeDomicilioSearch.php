<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Domicilio;

/**
 * SedeDomicilioSearch represents the model behind the search form about `app\models\SedeDomicilio`.
 */
class SedeDomicilioSearch extends Domicilio
{
    public $sede_id;
    public $pepe;

    public function rules()
    {
        return [
            [['id', 'pais_id', 'provincia_id', 'ciudad_id', 'principal'], 'integer'],
            [['direccion', 'cp', 'observaciones', 'pepe'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        //die(var_export($params));
        $query = Domicilio::find()
            ->innerJoinWith('sede')
            ->leftJoin('pais', 'domicilio.pais_id = pais.id')
            ->leftJoin('provincia', 'domicilio.provincia_id = provincia.id')
            ->leftJoin('ciudad', 'domicilio.ciudad_id = ciudad.id')
            ->andWhere(['sede.id' => $params['sede_id']]);
            
        ;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'pais_id' => $this->pais_id,
            'provincia_id' => $this->provincia_id,
            'ciudad_id' => $this->ciudad_id,
            'domicilio.principal' => $this->principal,
        ]);

        $query->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'cp', $this->cp])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
