<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Sede $model
 * @var app\models\Establecimiento $establecimiento
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Sede',
]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Establecimientos'), 'url' => ['establecimientos/index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['establecimientos/view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sedes'), 'url' => ['establecimientos/' . $establecimiento->id . '/sedes']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
