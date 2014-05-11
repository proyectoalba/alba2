<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Alumno $alumno
 */
?>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Datos del Alumno</div>
    <?= DetailView::widget([
        'model' => $alumno,
        'attributes' => [
            'perfil.apellido',
            'perfil.nombre',
            'perfil.fecha_alta:datetime',
            [
                'label' => 'Tipo Documento',
                'attribute' => 'perfil.tipoDocumento.abreviatura',
            ],
            'perfil.numero_documento',
        ],
    ]) ?>
</div>
