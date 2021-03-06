<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\company\Company */

$this->title = 'Добавление компании';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
