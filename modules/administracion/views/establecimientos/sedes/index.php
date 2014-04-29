<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\SedeSearch $searchModel
 * @var app\models\Establecimiento $establecimiento
 */

$this->title = Yii::t('app', 'Sedes');
echo $this->render('_breadcrumbs', ['establecimiento' => $establecimiento]);
array_pop($this->params['breadcrumbs']);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= $this->render('../_establecimiento', ['establecimiento' => $establecimiento]) ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
          'modelClass' => 'Sede',
        ]), ['establecimientos/' . $establecimiento->id . '/sedes/create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php
Pjax::begin();
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'codigo',
        'nombre',
        [
            'class' => 'yii\grid\ActionColumn',
            'urlCreator' => function ($action, $model, $key, $index) {
                return Url::toRoute(['establecimientos/' . $model->establecimiento_id . '/sedes/' . $action, 'id' => $model->id]);
            },
        ],
    ],
]); 
Pjax::end();
?>
</div>
