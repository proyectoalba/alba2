<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\TipoDocumento $model
 */

$this->title = 'Create Tipo Documento';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-documento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
