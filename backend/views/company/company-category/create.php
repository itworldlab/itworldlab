<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\company\CompanyCategory */

$this->title = 'Добавление категории компании';
$this->params['breadcrumbs'][] = ['label' => 'Company Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
