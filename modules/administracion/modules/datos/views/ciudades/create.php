<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Ciudad $model
 */

$this->title = 'Create Ciudad';
$this->params['breadcrumbs'][] = ['label' => 'Ciudads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciudad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
