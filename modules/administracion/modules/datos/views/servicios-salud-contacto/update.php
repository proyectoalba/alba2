<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\ServicioSaludContacto $model
 */

$this->title = 'Update Servicio Salud Contacto: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Servicio Salud Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicio-salud-contacto-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
