<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Pais $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Pais',
]);
echo $this->render('../_breadcrumbs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Países'), 'url' => ['datos/paises']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pais-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
