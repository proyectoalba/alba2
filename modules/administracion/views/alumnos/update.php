<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Alumno $model
 */

$this->title = $model->perfil->apellido . ', ' . $model->perfil->nombre;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Establecimientos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title . ' - ' . $model->perfil->documentoCompleto, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="alumno-update">

    <h1><?= Html::encode($this->title) ?><small> - <?= $model->perfil->documentoCompleto ?></small></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'perfil' => $model->perfil,
    ]) ?>

</div>
