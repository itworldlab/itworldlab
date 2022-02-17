<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\product\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Свойства товаров';
$this->params['breadcrumbs'][] = $this->title;
$cat_url = ['create'];
$cat_id = 0;

if(isset($_GET['category_id']))
{
    $cat_url = ['create','category_id'=>Yii::$app->request->get("category_id")];
    $cat_id = intval($_GET['category_id']);
}
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить свойство', $cat_url, ['class' => 'btn btn-success']) ?>

        <?php
        if($cat_id != 0)
            echo Html::a('Импорт', ['/product/prop-type/import','cat_id'=>$cat_id], ['class' => 'btn btn-primary btn-modal']);
        ?>
    </p>

    <?php
    if($cat != null):
    ?>
    <h1><?=$cat->name?></h1>
    <?php endif?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'class' => 'lav45\translate\grid\ActionColumn',
                'languages' => $langList,
                'header' => 'Переводы'
            ],
            'name',
            [
                'value' => function($data){
                    return Html::a("Свойства",['/product/prop/index', 'prop_type_id' => $data->id]);
                },
                'format' => 'raw'
            ],
            'type',
//            'install_count',
//            'logo',
//            'rate_average',
            //'rate_boon',
            //'rate_func',
            //'rate_support',
            //'rate_price',
            //'rate_count',
//            'admin.name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
