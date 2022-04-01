<?php

use kartik\select2\Select2;
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\product\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
    <?php
    echo $form->field($model, 'category_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\product\ProductCategory::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
    ]);
    ?>
    <?php
    echo $form->field($model, 'cats')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\product\ProductCategory::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
        'pluginOptions' => [
            'multiple' => true,
            'allowClear' => true
        ],
    ]);
    ?>
    <?php
    echo $form->field($model, 'compatibility')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\product\Product::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
        'pluginOptions' => [
            'multiple' => true,
            'allowClear' => true
        ],
    ]);
    ?>
    <?php
    echo $form->field($model, 'analogs')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\product\Product::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
        'pluginOptions' => [
            'multiple' => true,
            'allowClear' => true
        ],
    ]);
    ?>
    <?= $form->field($model, 'short_descr')->textInput(['maxlength' => true]) ?>
    <?php
    echo $form->field($model, 'descr')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
//            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
            ],
            'clips' => [
                ['Lorem ipsum...', 'Lorem...'],
                ['red', '<span class="label-red">red</span>'],
                ['green', '<span class="label-green">green</span>'],
                ['blue', '<span class="label-blue">blue</span>'],
            ],
        ],
    ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
    .select2-container{
        width:100% !important;
    }
</style>
