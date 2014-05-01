<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\models\Sede $model
 */

$this->title = $model->nombre;

echo $this->render('_breadcrumbs', ['establecimiento' => $model->establecimiento]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('../_establecimiento', ['establecimiento' => $model->establecimiento]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'codigo',
            'nombre',
            'telefono',
            'telefono_alternativo',
            'fax',
            'principal',
        ],
    ]) ?>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['establecimientos/' . $model->establecimiento_id . '/sedes/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['establecimientos/' . $model->establecimiento_id . '/sedes/delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>

<div class="domicilios-view">
    <h2>Domicilios de la Sede</h2>
<?php
Pjax::begin();
echo GridView::widget([
    'dataProvider' => $domiciliosDataProvider,
    //'filterModel' => $sedesSearchModel,
    'columns' => [
        'id',
        'direccion',
        'cp',
        [
            'label' => Yii::t('app', 'País'),
            'attribute' => 'pais_nombre',
            'value' => 'pais.nombre',
        ],
        [
            'label' => Yii::t('app', 'Provincia'),
            'attribute' => 'provincia_nombre',
            'value' => 'provincia.nombre',
        ],
        [
            'label' => Yii::t('app', 'Ciudad'),
            'attribute' => 'ciudad_nombre',
            'value' => 'ciudad.nombre',
        ],
        [
            'label' => Yii::t('app', 'Domicilio Principal'),
            'attribute' => 'principal',
            'class' => 'app\components\BooleanColumn',
        ],
    ],
]); 
Pjax::end();
?>
</div>

<?= $this->render('_nav', ['sede' => $model]) ?>
