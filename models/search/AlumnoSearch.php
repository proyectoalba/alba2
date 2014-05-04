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
    public $sexo_descripcion;
    public $tipo_documento_abreviatura;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['apellido', 'nombre', 'telefono', 'numero_documento', 'email', 'tipo_documento_abreviatura', 'sexo_descripcion'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Persona::find()
            ->joinWith('sexo')
            ->joinWith('tipoDocumento')
            ->innerJoinWith('alumno');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->getSort()->attributes = array_merge(
            $dataProvider->getSort()->attributes,
            [
                'tipo_documento_abreviatura' => [
                     'asc' => ['tipo_documento.abreviatura' => SORT_ASC],
                     'desc' => ['tipo_documento.abreviatura' => SORT_DESC],
                     'label' => Yii::t('app', 'Tipo de Documento'),
                 ],
                'sexo_descripcion' => [
                     'asc' => ['sexo.descripcion' => SORT_ASC],
                     'desc' => ['sexo.descripcion' => SORT_DESC],
                     'label' => Yii::t('app', 'Sexo'),
                 ],
             ]            
        );
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'sexo_id' => $this->sexo_id,
        ]);

        $query->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'numero_documento', $this->numero_documento])
            ->andFilterWhere(['like', 'tipo_documento.abreviatura', $this->tipo_documento_abreviatura])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
