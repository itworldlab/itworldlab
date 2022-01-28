<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Integrator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="integrator-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'projects_count')->textInput() ?>

    <?= $form->field($model, 'average_rate')->textInput() ?>

    <?= $form->field($model, 'open_date')->textInput() ?>

    <?= $form->field($model, 'short_descr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'addr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_id')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_id')->textInput() ?>

    <?= $form->field($model, 'blocked_at')->textInput() ?>

    <?= $form->field($model, 'blocked_id')->textInput() ?>

    <?= $form->field($model, 'last_activity')->textInput() ?>

<?=$form->field($model, 'logo_image')->widget(\budyaga\cropper\Widget::className(), [ 'uploadUrl' => \yii\helpers\Url::toRoute('/product/uploadPhoto')])?>
	<style>.jcrop-holder {
    top: -300px;
}</style>    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
