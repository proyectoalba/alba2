<?php
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Establecimientos'), 'url' => ['establecimientos/index']];
$this->params['breadcrumbs'][] = ['label' => $sede->establecimiento->nombre, 'url' => ['establecimientos/view', 'id' => $sede->establecimiento_id]];
$this->params['breadcrumbs'][] = ['label' => 'Sedes', 'url' => ['establecimientos/' . $sede->establecimiento_id . '/sedes']];
$this->params['breadcrumbs'][] = ['label' => $sede->nombre, 'url' => ['establecimientos/' . $sede->establecimiento_id . '/sedes/view', 'id' => $sede->id]];
$this->params['breadcrumbs'][] = ['label' => 'Domicilios', 'url' => ['establecimientos/' . $sede->establecimiento_id . '/sedes/' .$sede->id . '/domicilios']];
?>
