<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alumno;

/**
 * AlumnoSearch represents the model behind the search form about `app\models\Persona`.
 */
class AlumnoSearch extends Alumno
{
    public $sexo_descripcion;
    public $tipo_documento_abreviatura;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['perfil.apellido', 'perfil.nombre', 'perfil.telefono', 'perfil.numero_documento', 'perfil.email', 'tipo_documento_abreviatura', 'sexo_descripcion'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Alumno::find()
            ->joinWith('perfil')
            ->joinWith('perfil.sexo')
            ->joinWith('perfil.tipoDocumento');

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

        $query->andFilterWhere(['like', 'perfil.apellido', $this->apellido])
            ->andFilterWhere(['like', 'perfil.nombre', $this->nombre])
            ->andFilterWhere(['like', 'perfil.numero_documento', $this->numero_documento])
            ->andFilterWhere(['like', 'perfil.tipo_documento.abreviatura', $this->tipo_documento_abreviatura])
            ->andFilterWhere(['like', 'perfil.email', $this->email]);

        return $dataProvider;
    }
}
