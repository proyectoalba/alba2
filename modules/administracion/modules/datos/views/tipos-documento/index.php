<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\TipoDocumentoSearch $searchModel
 */

$this->title = 'Tipo Documentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-documento-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Tipo Documento', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'descripcion',
			'abreviatura',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
