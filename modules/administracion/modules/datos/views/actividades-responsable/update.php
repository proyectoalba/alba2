<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\ActividadResponsable $model
 */

$this->title = 'Update Actividad Responsable: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Actividad Responsables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="actividad-responsable-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
