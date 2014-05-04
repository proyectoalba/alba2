<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use app\models\TipoDocumento;
use app\models\EstadoDocumento;
use app\models\Sexo;

use yii\jui\DatePicker;

/**
 * @var yii\web\View $this
 * @var app\models\Persona $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'tipo_documento_id')->dropDownList(ArrayHelper::map(TipoDocumento::find()->orderBy('id ASC')->asArray()->all(), 'id', 'abreviatura')); ?>

    <?= $form->field($model, 'numero_documento')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'estado_documento_id')->dropDownList(ArrayHelper::map(EstadoDocumento::find()->orderBy('id ASC')->asArray()->all(), 'id', 'descripcion'), ['prompt' => '']); ?>
    
    <?= $form->field($model, 'sexo_id')->dropDownList(ArrayHelper::map(Sexo::find()->orderBy('id ASC')->asArray()->all(), 'id', 'descripcion'), ['prompt' => '']); ?>

    <?= $form->field($model, 'fecha_nacimiento')->widget(DatePicker::className(), ['options' => ['class' => 'form-control'], 'clientOptions' => ['dateFormat' => 'dd/mm/yy', 'changeYear' => true, 'changeMonth' => true]]) ?>

    <?= $form->field($model, 'lugar_nacimiento')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'observaciones')->textArea() ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'telefono_alternativo')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 99]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
