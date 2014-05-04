<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Persona $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Alumno',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administración'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Alumnos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
