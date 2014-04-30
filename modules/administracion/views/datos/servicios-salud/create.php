<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\ServicioSalud $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Servicio Salud',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Servicio Saluds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicio-salud-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
