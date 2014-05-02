<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\EstablecimientoSearch $searchModel
 */

$this->title = Yii::t('app', 'Establecimientos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="establecimiento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
          'modelClass' => 'Establecimiento',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php
Pjax::begin();
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'nombre',
        'codigo',
        'telefono',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            /*
            'buttons' => [
                'sedes' =>  function ($url, $model) {
                    $url = Url::toRoute('establecimientos/' . $model->id . '/sedes');
                    return Html::a('<span class="glyphicon glyphicon-home"></span>', $url, [
                        'title' => Yii::t('yii', 'Sedes'),
                        'data-pjax' => '0',
                    ]);
                }
            ],
            */ 
        ],
    ],
]); 
Pjax::end();
?>

</div>
