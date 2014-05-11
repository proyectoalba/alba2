<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SedeDomicilio $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' =>  Yii::t('app', 'Domicilio'),
]);
echo $this->render('_breadcrumbs', ['alumno' => $alumno]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-domicilio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('../_alumno', ['alumno' => $alumno]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
