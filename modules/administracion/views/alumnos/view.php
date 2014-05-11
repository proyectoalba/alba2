<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Alumno $model
 */

$this->title = $model->perfil->apellido . ', ' . $model->perfil->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Alumnos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title . ' - ' . $model->perfil->documentoCompleto;
?>
<div class="alumno-view">

    <h1><?= Html::encode($this->title) ?><small> - <?= $model->perfil->documentoCompleto ?></small></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'perfil.apellido',
            'perfil.nombre',
            'perfil.fecha_alta:datetime',
            [
                'label' => 'Tipo Documento',
                'attribute' => 'perfil.tipoDocumento.abreviatura',
            ],
            'perfil.numero_documento',
            [
                'label' => 'Estado del Documento',
                'attribute' => 'perfil.estadoDocumento.descripcion',
            ],
            [
                'label' => 'Sexo',
                'attribute' => 'perfil.sexo.descripcion',
            ],
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
