<?php

use lav45\translate\models\Lang;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\product\PropSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Props';
$this->params['breadcrumbs'][] = $this->title;
$param = ['create'];
if(isset($_GET['PropSearch']['prop_type_id'])){
    $param['prop_type_id'] = $_GET['PropSearch']['prop_type_id'];
}
if(isset($_GET['prop_type_id'])){
    $param['prop_type_id'] = Yii::$app->request->get("prop_type_id");
}
if(isset($_GET['PropSearch']['category_id'])){
    $param['category_id'] = $_GET['PropSearch']['category_id'];
}
?>
<div class="prop-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Prop', $param, ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'class' => 'lav45\translate\grid\ActionColumn',
                'languages' => Lang::getList(),
                'header' => 'Переводы'
            ],
            [
                'attribute' => 'icon',
                'value' => function($data){
                    return Html::img("/image/get?image=".$data->icon,['style'=>'width:50px;']);
                },
                'format' => 'raw'
            ],
            'status',
//            'icon',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
