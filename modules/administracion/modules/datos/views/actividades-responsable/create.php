<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\ActividadResponsable $model
 */

$this->title = 'Create Actividad Responsable';
$this->params['breadcrumbs'][] = ['label' => 'Actividad Responsables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividad-responsable-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
