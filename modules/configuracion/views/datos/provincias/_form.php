<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Pais;
/**
 * @var yii\web\View $this
 * @var app\models\Provincia $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="provincia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pais_id')->dropDownList(ArrayHelper::map(Pais::find()->orderBy('nombre ASC')->asArray()->all(), 'id', 'nombre')); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 60]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
