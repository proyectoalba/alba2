<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Sede $sede
 */
?>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Datos de la Sede</div>
    <?= DetailView::widget([
        'model' => $sede,
        'attributes' => [
            'nombre',
            'codigo',
        ],
    ]) ?>
</div>
