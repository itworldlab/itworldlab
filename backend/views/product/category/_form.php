<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use backend\models\product\ProductCategory;

/* @var $this yii\web\View */
/* @var $model backend\models\product\ProductCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-category-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ProductCategory::STATUS_DISABLED=>"Выключен",ProductCategory::STATUS_ACTIVE=>"Активен"]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
