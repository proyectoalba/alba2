<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\ServicioSaludContactoSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="servicio-salud-contacto-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'servicio_salud_id') ?>

		<?= $form->field($model, 'direccion') ?>

		<?= $form->field($model, 'cp') ?>

		<?= $form->field($model, 'pais_id') ?>

		<?php // echo $form->field($model, 'provincia_id') ?>

		<?php // echo $form->field($model, 'ciudad_id') ?>

		<?php // echo $form->field($model, 'telefono') ?>

		<?php // echo $form->field($model, 'telefono_alternativo') ?>

		<?php // echo $form->field($model, 'contacto_preferido')->checkbox() ?>

		<?php // echo $form->field($model, 'observaciones') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
