<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\ServicioSaludContacto $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
  'modelClass' => 'Servicio Salud Contacto',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Servicio Salud Contactos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="servicio-salud-contacto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
