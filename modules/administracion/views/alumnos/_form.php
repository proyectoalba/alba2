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
 * @var app\models\Alumno $model
 * @var app\models\Perfil $perfil
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="alumno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($perfil, 'apellido')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($perfil, 'nombre')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($perfil, 'tipo_documento_id')->dropDownList(ArrayHelper::map(TipoDocumento::find()->orderBy('id ASC')->asArray()->all(), 'id', 'abreviatura')); ?>

    <?= $form->field($perfil, 'numero_documento')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($perfil, 'estado_documento_id')->dropDownList(ArrayHelper::map(EstadoDocumento::find()->orderBy('id ASC')->asArray()->all(), 'id', 'descripcion'), ['prompt' => '']); ?>
    
    <?= $form->field($perfil, 'sexo_id')->dropDownList(ArrayHelper::map(Sexo::find()->orderBy('id ASC')->asArray()->all(), 'id', 'descripcion'), ['prompt' => '']); ?>

    <?= $form->field($perfil, 'fecha_nacimiento')->widget(DatePicker::className(), ['options' => ['class' => 'form-control'], 'clientOptions' => ['dateFormat' => 'dd/mm/yy', 'changeYear' => true, 'changeMonth' => true]]) ?>

    <?= $form->field($perfil, 'lugar_nacimiento')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($perfil, 'foto')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($perfil, 'observaciones')->textArea() ?>

    <?= $form->field($perfil, 'telefono')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($perfil, 'telefono_alternativo')->textInput(['maxlength' => 60]) ?>

    <?= $form->field($perfil, 'email')->textInput(['maxlength' => 99]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
