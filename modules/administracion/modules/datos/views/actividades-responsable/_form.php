<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\ActividadResponsable $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="actividad-responsable-form">

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'id')->textInput() ?>

		<?= $form->field($model, 'descripcion')->textInput(['maxlength' => 45]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
