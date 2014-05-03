<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Establecimiento $establecimiento
 */
?>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Datos del Establecimiento</div>
    <?= DetailView::widget([
        'model' => $establecimiento,
        'attributes' => [
            'nombre',
            'codigo',
        ],
    ]) ?>
</div>
