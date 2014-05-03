<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Ciudad $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Ciudad',
]);
echo $this->render('../_breadcrumbs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ciudades'), 'url' => ['datos/ciudades']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciudad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
