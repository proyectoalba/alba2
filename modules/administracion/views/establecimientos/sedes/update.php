<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Sede $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
  'modelClass' => 'Sede',
]) . ' ' . $model->id;

echo $this->render('_breadcrumbs', ['establecimiento' => $model->establecimiento]);
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['establecimientos/' . $model->establecimiento_id . '/sedes/view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sede-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('../_establecimiento', ['establecimiento' => $model->establecimiento]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?= $this->render('_nav', ['sede' => $model]) ?>

</div>
