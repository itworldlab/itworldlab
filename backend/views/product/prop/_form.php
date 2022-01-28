<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use backend\models\product\PropType;

/* @var $this yii\web\View */
/* @var $model backend\models\product\Prop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prop-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    if(!$model->isNewRecord):
    echo $form->field($model, 'prop_type_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\product\PropType::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    endif;
    ?>

    <?= $form->field($model, 'status')->dropDownList([PropType::STATUS_DISABLED=>"Выключен",PropType::STATUS_ACTIVE=>"Активен"]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
