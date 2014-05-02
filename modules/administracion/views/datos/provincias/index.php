<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Pais;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\ProvinciaSearch $searchModel
 */

$this->title = Yii::t('app', 'Provincias');
echo $this->render('../_breadcrumbs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provincia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Provincia',
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
            'filter' => ArrayHelper::map(Pais::find()->orderBy('nombre ASC')->asArray()->all(), 'id', 'nombre'),
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
