<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Sede $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sede-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'establecimiento_id')->textInput() ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => 99]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 99]) ?>

    <?= $form->field($model, 'principal')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'telefono_alternativo')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => 60]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
