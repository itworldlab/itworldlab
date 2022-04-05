<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\company\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'short_descr')->textInput() ?>
    <?= $form->field($model, 'descr')->textInput() ?>
    <?= $form->field($model, 'addr')->textInput() ?>
    <?= $form->field($model, 'projects_count')->textInput() ?>

    <?= $form->field($model, 'open_date')->textInput(['placeholder'=>date("Y")]) ?>

    <?= $form->field($model, 'status')->dropDownList([0=>"Выключен",1=>"Активен"]) ?>

    <?php
    echo $form->field($model, 'category_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\company\CompanyCategory::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
    ]);
    ?>

    <?php
    echo $form->field($model, 'cats')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\company\CompanyCategory::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
        'pluginOptions' => [
            'multiple' => true,
            'allowClear' => true
        ],
    ]);
    ?>
    <?php
    echo $form->field($model, 'regs')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Region::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
        'pluginOptions' => [
            'multiple' => true,
            'allowClear' => true
        ],
    ]);
    ?>

    <?php
    echo $form->field($model, 'region_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Region::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
