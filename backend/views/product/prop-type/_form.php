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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'category_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\product\ProductCategory::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
