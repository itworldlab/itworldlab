<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\product\ProductTarifSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Tarifs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-tarif-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product Tarif', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'price',
            'users_count',
            'demo_link',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductTarif $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 'product_id' => $model->product_id]);
                 }
            ],
        ],
    ]); ?>


</div>
