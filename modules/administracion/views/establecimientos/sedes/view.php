<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Sede $model
 */

$this->title = $model->id;

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
    <?= GridView::widget([
        'dataProvider' => $domiciliosDataProvider,
        //'filterModel' => $sedesSearchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'direccion',
            'cp',
            'pais_id',
            'provincia_id',
            'ciudad_id',
            'principal',
        ],
    ]); ?>
</div>

<?= $this->render('_nav', ['sede' => $model]) ?>
