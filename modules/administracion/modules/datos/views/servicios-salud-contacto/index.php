<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\ServicioSaludContactoSearch $searchModel
 */

$this->title = 'Servicio Salud Contactos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicio-salud-contacto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Servicio Salud Contacto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'servicio_salud_id',
            'direccion',
            'cp',
            'pais_id',
            // 'provincia_id',
            // 'ciudad_id',
            // 'telefono',
            // 'telefono_alternativo',
            // 'contacto_preferido',
            // 'observaciones',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
