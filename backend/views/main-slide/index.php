<?php

use lav45\translate\models\Lang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Main Slides';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-slide-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Main Slide', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'title',
            'descr',
            'status',
            'image',
            [
                'class' => 'lav45\translate\grid\ActionColumn',
                'languages' => Lang::getList(),
                'header' => 'Переводы'
            ],
            'sort',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
