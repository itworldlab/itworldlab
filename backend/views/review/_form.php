<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Review */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate_average')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate_boon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate_func')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate_support')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([0=>"На модерации",1=>"Активен"]) ?>

    <?php
    echo $form->field($model, 'product_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\product\Product::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
    ]);
    ?>
    <?php
    echo $form->field($model, 'user_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\User::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
