<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SedeDomicilio $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' =>  Yii::t('app', 'Sede Domicilio'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Establecimientos'), 'url' => ['establecimientos/index']];
$this->params['breadcrumbs'][] = ['label' => $model->sede->establecimiento_id, 'url' => ['establecimientos/view', 'id' => $model->sede->establecimiento_id]];
$this->params['breadcrumbs'][] = ['label' => 'Sedes', 'url' => ['establecimientos/' . $model->sede->establecimiento_id . '/sedes']];
$this->params['breadcrumbs'][] = ['label' => $model->sede_id, 'url' => ['establecimientos/' . $model->sede->establecimiento_id . '/sedes/view', 'id' => $model->sede_id]];
$this->params['breadcrumbs'][] = ['label' => 'Domicilios', 'url' => ['establecimientos/' . $model->sede->establecimiento_id . '/sedes/' .$model->sede_id . '/domicilios' ]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-domicilio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
