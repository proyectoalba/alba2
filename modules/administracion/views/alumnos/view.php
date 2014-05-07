<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Persona $model
 */

$this->title = $model->persona->apellido . ', ' . $model->persona->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Alumnos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view">

    <h1><?= Html::encode($this->title) ?> <small><?= $model->persona->documentoCompleto ?></small></h1>

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
            'persona.apellido',
            'persona.nombre',
            'fecha_alta',
            'persona.tipo_documento_id',
            'persona.numero_documento',
            'persona.estado_documento_id',
            'persona.sexo_id',
            'persona.fecha_nacimiento',
            'persona.lugar_nacimiento',
            'persona.telefono',
            'persona.telefono_alternativo',
            'persona.email:email',
            'persona.foto',
            'persona.observaciones',
        ],
    ]) ?>

</div>
