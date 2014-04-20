<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Sede $sede
 */
?>
<ul class="nav nav-pills">
    <li><?= Html::a(Yii::t('app', 'Administrar Domicilios'), ['establecimientos/' . $sede->establecimiento_id . '/sedes/' . $sede->id . '/domicilios']) ?></li>
</ul>



