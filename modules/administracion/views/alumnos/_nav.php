<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Establecimiento $establecimiento
 */
?>
<div class="btn-toolbar" role="toolbar">
    <?= Html::a(Yii::t('app', 'Administrar domicilios'), ['alumnos/' . $alumno->id . '/domicilios'], ['class' => 'btn btn-success btn-sm']) ?>
</div>
