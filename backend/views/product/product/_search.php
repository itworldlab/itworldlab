<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\product\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'rating') ?>

    <?= $form->field($model, 'install_count') ?>

    <?= $form->field($model, 'logo') ?>

    <?= $form->field($model, 'rate_average') ?>

    <?php // echo $form->field($model, 'rate_boon') ?>

    <?php // echo $form->field($model, 'rate_func') ?>

    <?php // echo $form->field($model, 'rate_support') ?>

    <?php // echo $form->field($model, 'rate_price') ?>

    <?php // echo $form->field($model, 'rate_count') ?>

    <?php // echo $form->field($model, 'admin_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
