<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;

/**
 * AlumnoSearch represents the model behind the search form about `app\models\Persona`.
 */
class AlumnoSearch extends Persona
{
    public function rules()
    {
        return [
            [['id', 'tipo_documento_id', 'estado_documento_id', 'sexo_id'], 'integer'],
            [['apellido', 'nombre', 'fecha_alta', 'numero_documento', 'fecha_nacimiento', 'lugar_nacimiento', 'telefono', 'telefono_alternativo', 'email', 'foto', 'observaciones'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Persona::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_alta' => $this->fecha_alta,
            'tipo_documento_id' => $this->tipo_documento_id,
            'estado_documento_id' => $this->estado_documento_id,
            'sexo_id' => $this->sexo_id,
            'fecha_nacimiento' => $this->fecha_nacimiento,
        ]);

        $query->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'numero_documento', $this->numero_documento])
            ->andFilterWhere(['like', 'lugar_nacimiento', $this->lugar_nacimiento])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'telefono_alternativo', $this->telefono_alternativo])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
