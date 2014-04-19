<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\SedeSearch $searchModel
 * @var app\models\Establecimiento $establecimiento
 */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Establecimientos'), 'url' => ['establecimientos/index']];
$this->params['breadcrumbs'][] = ['label' => $establecimiento->id, 'url' => ['establecimientos/view', 'id' => $establecimiento->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Sedes');
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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'codigo',
            'nombre',

            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::toRoute(['establecimientos/' . $model->establecimiento_id . '/sedes/' . $action, 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>

</div>
