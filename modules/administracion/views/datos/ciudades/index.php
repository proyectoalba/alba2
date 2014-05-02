<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Pais;
use app\models\Provincia;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\CiudadSearch $searchModel
 */

$this->title = Yii::t('app', 'Ciudades');
echo $this->render('../_breadcrumbs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciudad-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Ciudad',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php
Pjax::begin();
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        [
            'label' => Yii::t('app', 'País'),
            'attribute' => 'pais_id',
            'value' => 'pais.nombre',
            'filter' => ArrayHelper::map(Pais::find()->innerJoinWith('provincias', 'provincias.ciudades')->orderBy('nombre ASC')->asArray()->all(), 'id', 'nombre'),
        ],
        [
            'label' => Yii::t('app', 'Provincia'),
            'attribute' => 'provincia_id',
            'value' => 'provincia.nombre',
            //'filter' => ArrayHelper::map(Provincia::find()->innerJoinWith('ciudades')->orderBy('nombre ASC')->asArray()->all(), 'id', 'nombre'),
            'filter' => ArrayHelper::map(Provincia::find()->innerJoinWith('ciudades')->orderBy('nombre ASC')->asArray()->all(), 'id', 'nombre'), //['' => ''], // Vacío al principio,
        ],
        'nombre',
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ],
]);
Pjax::end();
?>
</div>
<?php
$url = Url::to(['/ajax/provincias-por-pais']);
$this->registerJs(<<<JS
$(document).ready(function(){

    function llenarComboProvincias(){
         $.ajax({
            type: 'get',
            dataType: 'json',
            url: '{$url}',
            data: 'pais_id=' + $('#ciudadsearch-pais_id').val(),
            success: function(response){
                out = '<option value=""></option>';
                response = JSON.parse(response);
                $.each(response, function(key, val){
                    out += "<option value='" + key + "'>" + val + "</option>";
                });
                $('#ciudadsearch-provincia_id').html(out);
                $('#ciudadsearch-provincia_id').val(provincia_seleccionada_id);
            }
        });
    }

    $(document).on('pjax:success', function(){
        //provincia_seleccionada_id = $('#ciudadsearch-provincia_id').val();
    
        $('#ciudadsearch-provincia_id').change(function(){
            provincia_seleccionada_id = $('#ciudadsearch-provincia_id').val();
        });

        $('#ciudadsearch-pais_id').change(function(){
            // Resetar la provincia para no mandarla al Request
            $('#ciudadsearch-provincia_id').html('<option value=""></option>');
        });
        llenarComboProvincias();

    });
    llenarComboProvincias();
});
JS
);
?>
