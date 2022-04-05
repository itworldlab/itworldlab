<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\company\CompaniesProductsItems */

$this->title = 'Update Companies Products Items: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Companies Products Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'companies_products_id' => $model->companies_products_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="companies-products-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
