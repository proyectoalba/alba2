<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Pais;
use app\models\Provincia;

/**
 * @var yii\web\View $this
 * @var app\models\Ciudad $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="ciudad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pais_id')->dropDownList(ArrayHelper::map(Pais::find()->innerJoinWith('provincias')->orderBy('nombre ASC')->asArray()->all(), 'id', 'nombre'), ['prompt' => '']); ?>
    
    <?= $form->field($model, 'provincia_id')->dropDownList(ArrayHelper::map(Provincia::find()->orderBy('nombre ASC')->asArray()->all(), 'id', 'nombre')); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 60]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$url = Url::to(['/ajax/provincias-por-pais']);
$this->registerJs(<<<JS
$('#ciudad-pais_id').change(function(){
     var pais_id = $('#ciudad-pais_id').val();
     $.ajax({
        type: 'get',
        dataType: 'json',
        url: '{$url}',
        data: 'pais_id=' + pais_id,
        success: function(response){
            out = '';
            response = JSON.parse(response);
            $.each(response, function(key, val){
                out += "<option value='" + key + "'>" + val + "</option>";
            });
            $('#ciudad-provincia_id').html(out);
        }
    });
});
JS
);
?>
