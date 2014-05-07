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
 * @var app\models\Persona $persona
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model->persona, 'apellido')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model->persona, 'nombre')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model->persona, 'tipo_documento_id')->dropDownList(ArrayHelper::map(TipoDocumento::find()->orderBy('id ASC')->asArray()->all(), 'id', 'abreviatura')); ?>

    <?= $form->field($model->persona, 'numero_documento')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model->persona, 'estado_documento_id')->dropDownList(ArrayHelper::map(EstadoDocumento::find()->orderBy('id ASC')->asArray()->all(), 'id', 'descripcion'), ['prompt' => '']); ?>
    
    <?= $form->field($model->persona, 'sexo_id')->dropDownList(ArrayHelper::map(Sexo::find()->orderBy('id ASC')->asArray()->all(), 'id', 'descripcion'), ['prompt' => '']); ?>

    <?= $form->field($model->persona, 'fecha_nacimiento')->widget(DatePicker::className(), ['options' => ['class' => 'form-control'], 'clientOptions' => ['dateFormat' => 'dd/mm/yy', 'changeYear' => true, 'changeMonth' => true]]) ?>

    <?= $form->field($model->persona, 'lugar_nacimiento')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model->persona, 'foto')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model->persona, 'observaciones')->textArea() ?>

    <?= $form->field($model->persona, 'telefono')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model->persona, 'telefono_alternativo')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($model->persona, 'email')->textInput(['maxlength' => 99]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
