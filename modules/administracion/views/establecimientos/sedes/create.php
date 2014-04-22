<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Sede $model
 * @var app\models\Establecimiento $establecimiento
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Sede',
]);

echo $this->render('_breadcrumbs', ['establecimiento' => $model->establecimiento]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('../_establecimiento', ['establecimiento' => $model->establecimiento]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
