<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SedeDomicilio $model
 */

$this->title = $model->direccion;

echo $this->render('_breadcrumbs', ['alumno' => $model->perfil->alumno]);
$this->params['breadcrumbs'][] = ['label' => $model->direccion, 'url' => ['alumnos/' . $model->perfil->alumno->id . '/domicilios/view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sede-domicilio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('../_alumno', ['alumno' => $model->perfil->alumno]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
