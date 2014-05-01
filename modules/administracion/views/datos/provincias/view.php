<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Provincia $model
 */

$this->title = $model->nombre;
echo $this->render('../_breadcrumbs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Provincias'), 'url' => ['datos/provincias']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provincia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pais_id',
            'nombre',
        ],
    ]) ?>

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
</div>
