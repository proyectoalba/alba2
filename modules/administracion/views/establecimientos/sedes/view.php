<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Sede $model
 */

$this->title = $model->id;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Establecimientos'), 'url' => ['establecimientos/index']];
$this->params['breadcrumbs'][] = ['label' => $model->establecimiento_id, 'url' => ['establecimientos/view', 'id' => $model->establecimiento_id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sedes'), 'url' => ['establecimientos/' . $model->establecimiento_id . '/sedes']];
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

<?= $this->render('_nav', ['sede' => $model]) ?>
