<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SedeDomicilio $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' =>  Yii::t('app', 'Sede Domicilio'),
]);
echo $this->render('_breadcrumbs', ['sede' => $model->sede]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sede-domicilio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('../_sede', ['sede' => $model->sede]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
