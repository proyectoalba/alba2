<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\ActividadResponsable $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Actividad Responsable',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Actividad Responsables'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividad-responsable-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
