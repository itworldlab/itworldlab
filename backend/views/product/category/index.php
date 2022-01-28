<?php

use lav45\translate\models\Lang;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product Category', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Общие свойства', ['/product/prop-type/index','category_id'=>0], ['class' => 'btn btn-warning']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'icon',
            'name',
            [
                'class' => 'lav45\translate\grid\ActionColumn',
                'languages' => Lang::getList(),
                'header' => 'Переводы'
            ],
            [
                'value' => function($data){
                    return Html::a("Свойства",['/product/prop-type/index', 'category_id' => $data->id]);
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'icon',
                'value' => function($data){
                    return Html::img("/uploads/".$data->icon,['style'=>'width:50px;']);
                },
                'format' => 'raw'
            ],
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
