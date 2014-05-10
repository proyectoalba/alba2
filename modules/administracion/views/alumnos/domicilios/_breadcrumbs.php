<?php
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Alumnos'), 'url' => ['alumnos/index']];
$this->params['breadcrumbs'][] = ['label' => $alumno->perfil->apellido . ', ' . $alumno->perfil->nombre, 'url' => ['alumnos/view', 'id' => $alumno->id]];
$this->params['breadcrumbs'][] = ['label' => 'Domicilios', 'url' => ['alumnos/' . $alumno->id . '/domicilios/index']];
?>
