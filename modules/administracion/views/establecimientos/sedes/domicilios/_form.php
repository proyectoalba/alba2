<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

use app\models\Pais;
use app\models\Provincia;
use app\models\Ciudad;

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

    <?= $form->field($model, 'pais_id')->dropDownList(ArrayHelper::map(Pais::find()->innerJoinWith('provincias', 'provincias.ciudades')->orderBy('nombre ASC')->asArray()->all(), 'id', 'nombre'), ['prompt' => '']); ?>
    
    <?php if($model->isNewRecord): ?>
    
    <?= $form->field($model, 'provincia_id')->dropDownList(['' => 'Seleccione un País'], ['prompt' => '']); ?>

    <?= $form->field($model, 'ciudad_id')->dropDownList(['' => 'Seleccione una Provincia'], ['prompt' => '']); ?>
    
    <?php else: ?>
     
    <?= $form->field($model, 'provincia_id')->dropDownList(ArrayHelper::map(Provincia::find()->innerJoinWith('ciudades')->orderBy('nombre ASC')->asArray()->all(), 'id', 'nombre')); ?>

    <?= $form->field($model, 'ciudad_id')->dropDownList(ArrayHelper::map(Ciudad::find()->innerJoinWith('provincia')->orderBy('nombre ASC')->asArray()->all(), 'id', 'nombre')); ?>

    <?php endif; ?>
    
    <?= $form->field($model, 'cp')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'observaciones')->textArea(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$url_provincias_por_pais = Url::to(['/ajax/provincias-por-pais']);
$url_ciudades_por_provincia = Url::to(['/ajax/ciudades-por-provincia']);
$this->registerJs(<<<JS
$('#domicilio-pais_id').change(function(){
     var pais_id = $('#domicilio-pais_id').val();
     $.ajax({
        type: 'get',
        dataType: 'json',
        url: '{$url_provincias_por_pais}',
        data: 'pais_id=' + pais_id,
        success: function(response){
            out = '';
            response = JSON.parse(response);
            $.each(response, function(key, val){
                out += "<option value='" + key + "'>" + val + "</option>";
            });
            $('#domicilio-provincia_id').html(out);
            $('#domicilio-provincia_id').change();
        }
    });
    
});
$('#domicilio-provincia_id').change(function(){
     var ciudad_id = $('#domicilio-ciudad_id').val();
     alert(ciudad_id);
     $.ajax({
        type: 'get',
        dataType: 'json',
        url: '{$url_ciudades_por_provincia}',
        data: 'provincia_id=' + ciudad_id,
        success: function(response){
            out = '';
            response = JSON.parse(response);
            $.each(response, function(key, val){
                out += "<option value='" + key + "'>" + val + "</option>";
            });
            $('#domicilio-ciudad_id').html(out);
        }
    });
});
JS
);
?>
