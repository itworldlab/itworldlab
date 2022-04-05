<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\company\CompaniesProducts */

$this->title = 'Update Companies Products: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Companies Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'company_id' => $model->company_id, 'product_id' => $model->product_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="companies-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
