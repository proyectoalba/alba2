<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\SedeDomicilioSearch $searchModel
 * @var app\models\Sede $sede
 */

$this->title = Yii::t('app', 'Domicilios');
echo $this->render('_breadcrumbs', ['alumno' => $alumno]);
array_pop($this->params['breadcrumbs']);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-domicilio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php  echo $this->render('../_alumno', ['alumno' => $alumno]) ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
          'modelClass' => Yii::t('app', 'Sede Domicilio'),
        ]), ['alumnos/' . $alumno->id . '/domicilios/create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php   
Pjax::begin();
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'direccion',
        'cp',
        [
            'label' => Yii::t('app', 'País'),
            'attribute' => 'pais_nombre',
            'value' => 'pais.nombre',
        ],
        [
            'label' => Yii::t('app', 'Provincia'),
            'attribute' => 'provincia_nombre',
            'value' => 'provincia.nombre',
        ],
        [
            'label' => Yii::t('app', 'Ciudad'),
            'attribute' => 'ciudad_nombre',
            'value' => 'ciudad.nombre',
        ],
        [
            'label' => Yii::t('app', 'Domicilio Principal'),
            'attribute' => 'principal',
            'class' => 'app\components\grid\BooleanColumn',
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'urlCreator' => function ($action, $model, $key, $index) use ($alumno) {
                return Url::toRoute(['alumnos/' . $alumno->id . '/domicilios/' . $action, 'id' => $model->id]);
            },
        ],
    ],
]);  
Pjax::end(); 
?>
</div>
