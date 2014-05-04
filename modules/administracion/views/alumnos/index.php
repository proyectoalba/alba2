<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\AlumnoSearch $searchModel
 */

$this->title = Yii::t('app', 'Alumnos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
          'modelClass' => 'Alumno',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'apellido',
            'nombre',
            [
                'label' => 'Tipo Documento',
                'attribute' => 'tipo_documento_abreviatura',
                'value' => 'tipoDocumento.abreviatura',
            ],
            'numero_documento',
            [
                'label' => 'Sexo',
                'value' => 'sexo.descripcion',
                'attribute' => 'sexo_descripcion'
            ],
            'telefono',
            'email:email',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
