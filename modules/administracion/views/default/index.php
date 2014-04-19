<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['index']];
?>
<div class="administracion-default-index">
	<h1>Módulo de Administración</h1>
    
</div>
