<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\company\CompaniesProducts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companies-products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'partner_status')->textInput() ?>


    <?php
    echo $form->field($model, 'company_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\company\Company::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
    ]);
    ?>
    <?php
    echo $form->field($model, 'product_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\product\Product::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
    ]);
    ?>

    <?= $form->field($model, 'min_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
