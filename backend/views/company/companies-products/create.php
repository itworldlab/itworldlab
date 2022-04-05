<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\company\CompaniesProducts */

$this->title = 'Добавление продукта компании';
$this->params['breadcrumbs'][] = ['label' => 'Companies Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
