<?php

use lav45\translate\models\Lang;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\product\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Названия свойств', ['/product/prop-type/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Категории', ['/product/category/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{summary}\n{pager}\n{items}\n{pager}",
        'columns' => [
            'id',
//            ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'raw',
                'attribute' => 'category_id',
                'filter' => \yii\helpers\ArrayHelper::map(\backend\models\product\ProductCategory::GetAll(),'id','name'),
                'value' => function($data){
                    if(!empty($data->category)){
                        $ret = "";
                        if($data->link != null){
                            $ret = "1_|||";
                        }
                        $ret .= $data->category->name;
                        return $ret;
                    }
                    return "";
                }
            ],

            [
                'class' => 'lav45\translate\grid\ActionColumn',
                'languages' => Lang::getList(),
                'header' => 'Переводы'
            ],
            'name',
            'short_descr',
//            'descr',
            [
                'attribute' => 'logo',
                'value' => function($data){
                    return Html::img("/uploads/".$data->logo,['style'=>'width:50px;']);
                },
                'format' => 'raw'
            ],
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
