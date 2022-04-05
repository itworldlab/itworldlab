<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MainSlide */

$this->title = 'Create Main Slide';
$this->params['breadcrumbs'][] = ['label' => 'Main Slides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-slide-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
