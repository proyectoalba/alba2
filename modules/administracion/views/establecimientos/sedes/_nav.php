<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Sede $sede
 */
?>
<div class="btn-toolbar" role="toolbar">
    <?= Html::a(Yii::t('app', 'Administrar Domicilios'), ['establecimientos/' . $sede->establecimiento_id . '/sedes/' . $sede->id . '/domicilios'], ['class' => 'btn btn-success btn-sm']) ?>
</div>


