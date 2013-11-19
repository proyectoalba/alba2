<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\ActividadResponsableSearch $searchModel
 */

$this->title = 'Actividad Responsables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividad-responsable-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create ActividadResponsable', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'descripcion',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
