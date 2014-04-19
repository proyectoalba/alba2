<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Sede $model
 * @var app\models\Establecimiento $establecimiento
 */

$this->title = $model->id;


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Establecimientos'), 'url' => ['establecimientos/index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['establecimientos/view', 'id' => $establecimiento->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sedes'), 'url' => ['establecimientos/' . $establecimiento->id . '/sedes']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('../_establecimiento', ['establecimiento' => $establecimiento]) ?>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Establecimiento',
                'value' => $establecimiento->nombre,
            ],
            'codigo',
            'nombre',
            'telefono',
            'telefono_alternativo',
            'fax',
            'principal',
        ],
    ]) ?>

</div>
