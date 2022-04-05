<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\company\CompaniesProductsItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies Products Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-products-items-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Companies Products Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'companies_products_id',
            'price',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CompaniesProductsItems $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 'companies_products_id' => $model->companies_products_id]);
                 }
            ],
        ],
    ]); ?>


</div>
