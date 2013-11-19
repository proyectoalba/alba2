<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Provincia $model
 */

$this->title = 'Create Provincia';
$this->params['breadcrumbs'][] = ['label' => 'Provincias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provincia-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
