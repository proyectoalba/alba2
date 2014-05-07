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
    public $perfilApellido;
    public $perfilNombre;
    public $perfilNumeroDocumento;
    public $perfilTelefono;
    public $perfilEmail;
    public $tipoDocumentoAbreviatura;
    public $sexoDescripcion;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['perfilApellido', 'perfilNombre', 'perfilTelefono', 'perfilNumeroDocumento', 'perfilEmail', 'tipoDocumentoAbreviatura', 'sexoDescripcion'], 'safe'],
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
                'perfilApellido' => [
                     'asc' => ['perfil.apellido' => SORT_ASC],
                     'desc' => ['perfil.apellido' => SORT_DESC],
                     'label' => Yii::t('app', 'Apellido'),
                 ],
                'perfilNombre' => [
                     'asc' => ['perfil.nombre' => SORT_ASC],
                     'desc' => ['perfil.nombre' => SORT_DESC],
                     'label' => Yii::t('app', 'Nombre'),
                 ],
                'tipoDocumentoAbreviatura' => [
                     'asc' => ['tipo_documento.abreviatura' => SORT_ASC],
                     'desc' => ['tipo_documento.abreviatura' => SORT_DESC],
                     'label' => Yii::t('app', 'Tipo de Documento'),
                 ],
                'perfilNumeroDocumento' => [
                     'asc' => ['perfil.numero_documento' => SORT_ASC],
                     'desc' => ['perfil.numero_documento' => SORT_DESC],
                     'label' => Yii::t('app', 'Documento'),
                 ],
                'sexoDescripcion' => [
                     'asc' => ['sexo.descripcion' => SORT_ASC],
                     'desc' => ['sexo.descripcion' => SORT_DESC],
                     'label' => Yii::t('app', 'Sexo'),
                 ],
                'perfilTelefono' => [
                     'asc' => ['perfil.telefono' => SORT_ASC],
                     'desc' => ['perfil.telefono' => SORT_DESC],
                     'label' => Yii::t('app', 'Teléfono'),
                 ],
                'perfilEmail' => [
                     'asc' => ['perfil.email' => SORT_ASC],
                     'desc' => ['perfil.email' => SORT_DESC],
                     'label' => Yii::t('app', 'Email'),
                 ],
             ]            
        );
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'perfil.apellido', $this->perfilApellido])
            ->andFilterWhere(['like', 'perfil.nombre', $this->perfilNombre])
            ->andFilterWhere(['like', 'tipo_documento.abreviatura', $this->tipoDocumentoAbreviatura])
            ->andFilterWhere(['like', 'perfil.numero_documento', $this->perfilNumeroDocumento])
            ->andFilterWhere(['like', 'perfil.tipo_documento.abreviatura', $this->tipoDocumentoAbreviatura])
            ->andFilterWhere(['like', 'perfil.email', $this->perfilEmail])
        ;

        return $dataProvider;
    }
}
