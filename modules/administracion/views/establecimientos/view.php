<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var app\models\Establecimiento $model
 * @var yii\data\ActiveDataProvider $sedesDataProvider
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Establecimientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->id;
?>
<div class="establecimiento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nombre',
            'codigo',
            'numero',
            'telefono',
            'telefono_alternativo',
            'fax',
            'email:email',
            'sitio_web',
            'dependencia_organizativa_id',
        ],
    ]) ?>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>

<div class="sedes-view">
    <h2>Sedes del Establecimiento</h2>
    <?= GridView::widget([
        'dataProvider' => $sedesDataProvider,
        //'filterModel' => $sedesSearchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'codigo',
            'nombre',
        ],
    ]); ?>
</div>

<?= $this->render('_nav', ['establecimiento' => $model]) ?>
