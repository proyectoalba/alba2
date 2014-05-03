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
            'attribute' => 'pais_nombre',
            'value' => 'provincia.pais.nombre',
        ],
        [
            'label' => Yii::t('app', 'Provincia'),
            'attribute' => 'provincia_nombre',
            'value' => 'provincia.nombre',
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
