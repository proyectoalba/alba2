<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\SedeDomicilioSearch $searchModel
 * @var app\models\Sede $sede
 */

$this->title = Yii::t('app', 'Sede Domicilios');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Establecimientos'), 'url' => ['establecimientos/index']];
$this->params['breadcrumbs'][] = ['label' => $sede->establecimiento_id, 'url' => ['establecimientos/view', 'id' => $sede->establecimiento_id]];
$this->params['breadcrumbs'][] = ['label' => 'Sedes', 'url' => ['establecimientos/' . $sede->establecimiento_id . '/sedes']];
$this->params['breadcrumbs'][] = ['label' => $sede->id, 'url' => ['establecimientos/' . $sede->establecimiento_id . '/sedes/view', 'id' => $sede->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-domicilio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
          'modelClass' => Yii::t('app', 'Sede Domicilio'),
        ]), ['establecimientos/' . $sede->establecimiento_id . '/sedes/' . $sede->id . '/domicilios/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        #'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'direccion',
            'cp',
            'pais_id',
            'provincia_id',
            'ciudad_id',
            'principal',
            // 'observaciones',

            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::toRoute(['establecimientos/' . $model->sede->establecimiento_id . '/sedes/' . $model->sede_id . '/domicilios/' . $action, 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>

</div>
