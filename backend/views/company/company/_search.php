<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\company\CompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'projects_count') ?>

    <?= $form->field($model, 'average_rate') ?>

    <?= $form->field($model, 'open_date') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'logo_image') ?>

    <?php // echo $form->field($model, 'wall_image') ?>

    <?php // echo $form->field($model, 'company_category_id') ?>

    <?php // echo $form->field($model, 'region_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
