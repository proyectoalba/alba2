<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Establecimiento $establecimiento
 */
?>
<ul class="nav nav-pills">
    <li><?= Html::a(Yii::t('app', 'Administrar Sedes'), ['establecimientos/' . $establecimiento->id . '/sedes']) ?></li>
</ul>



