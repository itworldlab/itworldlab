<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MainTag */

$this->title = 'Create Main Tag';
$this->params['breadcrumbs'][] = ['label' => 'Main Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-tag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
