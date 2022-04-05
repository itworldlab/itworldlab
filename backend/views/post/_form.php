<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\post\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'descr')->textarea() ?>
    <?= $form->field($model, 'views')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?php
    echo $form->field($model, 'category_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\post\PostCategory::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
    ]);
    ?>

    <?php
    echo $form->field($model, 'region_id')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Region::GetAll(),'id','name'),
        'options' => ['placeholder' => 'Выберите ...'],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
