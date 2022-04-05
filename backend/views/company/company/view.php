<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\company\Company */

$this->title = "Компания: ".$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить продукт', ['/company/companies-products/create', 'company_id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'projects_count',
            'average_rate',
            'open_date',
            'status',
            'logo_image',
            'wall_image',
            'category.name',
            'region.name',
        ],
    ]) ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product.name',
            'company_id',
            'product_id',
            'props:ntext',
            'min_price',
            [
                    'attribute' => '',
                'value' => function($data){
                    return Html::a("Открыть",['/company/companies-products/view','id'=>$data->id]);
                },
                'format' => 'raw'
            ],
        ],
    ]); ?>

</div>
