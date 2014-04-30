<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\TipoDocumento $model
 */

$this->title = Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Tipo Documento',
]);
echo $this->render('../_breadcrumbs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipos de Documento'), 'url' => ['datos/tipos-documento']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-documento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
