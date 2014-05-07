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
<div class="alumno-index">

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
            [
                'label' => 'Apellido',
                'attribute' => 'perfilApellido',
                'value' => 'perfil.apellido',
            ],
            [
                'label' => 'Nombre',
                'attribute' => 'perfilNombre',
                'value' => 'perfil.nombre',
            ],
            [
                'label' => 'Tipo Documento',
                'attribute' => 'tipoDocumentoAbreviatura',
                'value' => 'perfil.tipoDocumento.abreviatura',
            ],
            [
                'label' => 'Número Documento',
                'attribute' => 'perfilNumeroDocumento',
                'value' => 'perfil.numero_documento',
            ],
            [
                'label' => 'Sexo',
                'value' => 'perfil.sexo.descripcion',
                'attribute' => 'sexoDescripcion'
            ],
            
            [
                'label' => 'Teléfono',
                'attribute' => 'perfilTelefono',
                'value' => 'perfil.telefono',
            ],
            [
                'label' => 'Email',
                'attribute' => 'perfilEmail',
                'value' => 'perfil.email',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
