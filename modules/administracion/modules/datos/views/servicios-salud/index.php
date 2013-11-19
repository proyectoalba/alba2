<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\ServicioSaludSearch $searchModel
 */

$this->title = 'Servicio Saluds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicio-salud-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create ServicioSalud', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'codigo',
			'abreviatura',
			'nombre',
			'email:email',
			// 'sitio_web',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
