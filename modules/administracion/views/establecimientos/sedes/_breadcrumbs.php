<?php
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Establecimientos'), 'url' => ['establecimientos/index']];
$this->params['breadcrumbs'][] = ['label' => $establecimiento->nombre, 'url' => ['establecimientos/view', 'id' => $establecimiento->id]];
$this->params['breadcrumbs'][] = ['label' => 'Sedes', 'url' => ['establecimientos/' . $establecimiento->id . '/sedes']];
?>
