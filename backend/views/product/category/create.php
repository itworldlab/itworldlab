<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\product\ProductCategory */

$this->title = 'Добавление категории продукта ( ' . $model->language . ' )';
$this->params['breadcrumbs'][] = ['label' => 'Product Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-create card">

    <h1 class="card-header"><?= Html::encode($this->title) ?></h1>

    <div class="card-body">
        <?= $this->render('_form', [
        'model' => $model,
        ]) ?>
    </div>

</div>
