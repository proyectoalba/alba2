<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\SedeDomicilio $model
 */

$this->title = $model->id;
echo $this->render('_breadcrumbs', ['sede' => $model->sede]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-domicilio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('../_sede', ['sede' => $model->sede]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'sede_id',
            'direccion',
            'cp',
            'pais_id',
            'provincia_id',
            'ciudad_id',
            'principal',
            'observaciones',
        ],
    ]) ?>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['establecimientos/' . $model->sede->establecimiento_id . '/sedes/' . $model->sede_id . '/domicilios/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['establecimientos/' . $model->sede->establecimiento_id . '/sedes/' . $model->sede_id . '/domicilios/update', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
