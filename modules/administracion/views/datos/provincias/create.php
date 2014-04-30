<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Provincia $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Provincia',
]);
echo $this->render('../_breadcrumbs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ciudades'), 'url' => ['datos/provincias']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provincia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
