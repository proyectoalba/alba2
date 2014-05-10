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
            'id',
            'perfil.apellido',
            'perfil.nombre',
            'perfil.fecha_alta:datetime',
            'perfil.tipo_documento_id',
            'perfil.numero_documento',
            'perfil.estado_documento_id',
            'perfil.sexo_id',
            'perfil.fecha_nacimiento:date',
            'perfil.lugar_nacimiento',
            'perfil.telefono',
            'perfil.telefono_alternativo',
            'perfil.email:email',
            'perfil.foto',
            'perfil.observaciones',
        ],
    ]) ?>
</div>
