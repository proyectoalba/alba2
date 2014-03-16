<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\ServicioSaludContacto $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Servicio Salud Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicio-salud-contacto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'servicio_salud_id',
            'direccion',
            'cp',
            'pais_id',
            'provincia_id',
            'ciudad_id',
            'telefono',
            'telefono_alternativo',
            'contacto_preferido',
            'observaciones',
        ],
    ]) ?>

</div>
