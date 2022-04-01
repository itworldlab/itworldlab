<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ReviewSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'plus') ?>

    <?= $form->field($model, 'minus') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'rate_average') ?>

    <?php // echo $form->field($model, 'rate_boon') ?>

    <?php // echo $form->field($model, 'rate_func') ?>

    <?php // echo $form->field($model, 'rate_support') ?>

    <?php // echo $form->field($model, 'rate_price') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'product_id') ?>

    <?php // echo $form->field($model, 'integrator_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
