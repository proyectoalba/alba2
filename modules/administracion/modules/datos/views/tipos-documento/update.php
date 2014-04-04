<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\TipoDocumento $model
 */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
  'modelClass' => 'Tipo Documento',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Documentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipo-documento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
