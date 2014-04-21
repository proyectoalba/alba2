<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\SedeDomicilio $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sede-domicilio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => 99]) ?>

    <?= $form->field($model, 'principal')->checkBox() ?>

    <?= $form->field($model, 'pais_id')->textInput() ?>

    <?= $form->field($model, 'provincia_id')->textInput() ?>

    <?= $form->field($model, 'ciudad_id')->textInput() ?>

    <?= $form->field($model, 'cp')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
