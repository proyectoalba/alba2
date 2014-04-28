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
echo $this->render('_breadcrumbs', ['sede' => $sede]);
array_pop($this->params['breadcrumbs']);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-domicilio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= $this->render('../_sede', ['sede' => $sede]) ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
          'modelClass' => Yii::t('app', 'Sede Domicilio'),
        ]), ['establecimientos/' . $sede->establecimiento_id . '/sedes/' . $sede->id . '/domicilios/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'direccion',
            'cp',
            [
                'label' => 'País',
                'value' => 'pais.nombre',
            ],
            [
                'label' => 'Provincia',
                'attribute' => 'provincia_id',
                'value' => 'provincia.nombre',
            ],
            [
                'label' => 'Ciudad',
                'value' => 'ciudad.nombre',
            ],
            [
                'label' => 'Domicilio Principal',
                'attribute' => 'pepe',
                'class' => 'app\components\BooleanColumn',
                'value' => function ($model, $index, $widget) {
                    return $model->id % 2 == 0;
                }
            ],
            //'principal', 
            // 'observaciones',

            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) use ($sede) {
                    return Url::toRoute(['establecimientos/' . $sede->establecimiento_id . '/sedes/' . $sede->id . '/domicilios/' . $action, 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>

</div>
