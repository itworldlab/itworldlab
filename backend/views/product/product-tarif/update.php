<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\product\ProductTarif */

$this->title = 'Update Product Tarif: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Product Tarifs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'product_id' => $model->product_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-tarif-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
