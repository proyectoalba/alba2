<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\SedeDomicilio $model
 */

$this->title = $model->direccion;
echo $this->render('_breadcrumbs', ['alumno' => $model->perfil->alumno]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-domicilio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('../_alumno', ['alumno' => $model->perfil->alumno]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'direccion',
            'cp',
            'pais.nombre',
            'provincia.nombre',
            'ciudad.nombre',
            'principal:boolean',
            'observaciones',
        ],
    ]) ?>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['alumnos/' . $model->perfil->alumno->id . '/domicilios/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['alumnos/' . $model->perfil->alumno->id . '/domicilios/delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
