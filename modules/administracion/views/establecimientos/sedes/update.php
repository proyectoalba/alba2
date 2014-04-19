<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Sede $model
 * @var app\models\Establecimiento $establecimientos
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
  'modelClass' => 'Sede',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Establecimientos'), 'url' => ['establecimientos/index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['establecimientos/view', 'id' => $establecimiento->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sedes'), 'url' => ['establecimientos/' . $establecimiento->id . '/sedes']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sede-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
