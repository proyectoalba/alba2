<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipoDocumento;

/**
 * TipoDocumentoSearch represents the model behind the search form about `app\models\TipoDocumento`.
 */
class TipoDocumentoSearch extends Model
{
    public $id;
    public $descripcion;
    public $abreviatura;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['descripcion', 'abreviatura'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'abreviatura' => 'Abreviatura',
        ];
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

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'descripcion', true);
        $this->addCondition($query, 'abreviatura', true);
        return $dataProvider;
    }

    protected function addCondition($query, $attribute, $partialMatch = false)
    {
        if (($pos = strrpos($attribute, '.')) !== false) {
            $modelAttribute = substr($attribute, $pos + 1);
        } else {
            $modelAttribute = $attribute;
        }

        $value = $this->$modelAttribute;
        if (trim($value) === '') {
            return;
        }
        if ($partialMatch) {
            $query->andWhere(['like', $attribute, $value]);
        } else {
            $query->andWhere([$attribute => $value]);
        }
    }
}
