<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use app\models\DependenciaOrganizativa;

/**
 * @var yii\web\View $this
 * @var app\models\Establecimiento $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="establecimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 99]) ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => 99]) ?>

    <?= $form->field($model, 'dependencia_organizativa_id')->dropDownList(ArrayHelper::map(DependenciaOrganizativa::find()->orderBy('nombre ASC')->asArray()->all(), 'id', 'nombre')); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 99]) ?>

    <?= $form->field($model, 'sitio_web')->textInput(['maxlength' => 99]) ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'telefono_alternativo')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => 60]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
