<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\ServicioSaludContacto $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="servicio-salud-contacto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'servicio_salud_id')->textInput() ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => 99]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'pais_id')->textInput() ?>

    <?= $form->field($model, 'provincia_id')->textInput() ?>

    <?= $form->field($model, 'ciudad_id')->textInput() ?>

    <?= $form->field($model, 'contacto_preferido')->textInput() ?>

    <?= $form->field($model, 'cp')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'telefono_alternativo')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
