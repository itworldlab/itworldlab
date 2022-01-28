<?php

use backend\models\product\PropType;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\product\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view card">

    <h1 class="card-header"><?= Html::encode($this->title) ?></h1>

    <div class="card-body">
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id, 'admin_id' => $model->admin_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id, 'admin_id' => $model->admin_id], [
            'class' => 'btn btn-danger',
            'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
            ],
            ]) ?>
        </p>

        <div class="row">
            <div class="col-md-4">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'name',
                        'rating',
                        'install_count',
                        [
                            'attribute' => 'logo',
                            'value' => function($data){
                                return Html::img($data->logo,['style'=>'width:50px;']);
                            },
                            'format' => 'html'
                        ],
                        'rate_average',
                        'rate_boon',
                        'rate_func',
                        'rate_support',
                        'rate_price',
                        'rate_count',
                        'admin_id',
                    ],
                ]) ?>
            </div>
            <div class="col-md-8">
                <div>
                    <div class="card mb-0 rounded-bottom-0">
                        <div class="card-header">
                            <h6 class="card-title">
                                <a data-toggle="collapse" class="text-body collapsed" href="#category-0" aria-expanded="false">Без категории</a>
                            </h6>
                        </div>

                        <div id="category-0" class="collapse" style="">
                            <div class="card-body">
                                <?php $form = ActiveForm::begin();?>
                                <div class="row">
                                    <?php
                                    foreach(PropType::find()->where(['category_id'=>0])->all() as $prop_type):?>
                                        <div class="col-md-3">
                                            <h5><?=$prop_type->name?></h5>

                                            <ul class="props-list">
                                                <?php foreach($prop_type->props as $prop):?>
                                                    <li>
                                                        <?=$form->field($prop_form,'props['.$prop->id.']')->checkbox(['id'=>"prop_".$prop->id])->label(\yii\bootstrap4\Html::img('/image/get?image='.$prop->icon,['style'=>'width:25px;margin-right:5px;']).$prop->name)?>
                                                    </li>
                                                <?php endforeach;?>
                                            </ul>
                                        </div>

                                    <?php  endforeach;?>
                                </div>
                                <?php
                                echo \yii\bootstrap4\Html::submitButton("Отправить",['class'=>'btn btn-success']);

                                ?>
                                <?php ActiveForm::end();?>
                            </div>
                        </div>
                    </div>
                    <?php foreach(\backend\models\product\ProductCategory::GetAll() as $category):?>
                        <?php
                        $prop_types = PropType::find()->where(['category_id'=>$category->id])->all();
                        ?>
                    <div class="card mb-0 rounded-bottom-0">
                        <div class="card-header">
                            <h6 class="card-title">
                                <a data-toggle="collapse" class="text-body collapsed" href="#category-<?=$category->id?>" aria-expanded="false"><?=$category->name?></a>
                            </h6>
                        </div>

                        <div id="category-<?=$category->id?>" class="collapse <?=$category->id == $model->category_id ? 'show' : ''?>" style="">
                            <div class="card-body">
                                <?php $form = ActiveForm::begin();?>
                                <div class="row">
                                    <?php
                                    foreach($prop_types as $prop_type):?>
                                        <div class="col-md-3">
                                            <h5><?=$prop_type->name?></h5>

                                            <ul class="props-list">
                                                <?php foreach($prop_type->props as $prop):?>
                                                    <li>
                                                        <?=$form->field($prop_form,'props['.$prop->id.']')->checkbox(['id'=>"prop_".$prop->id])->label(\yii\bootstrap4\Html::img('/image/get?image='.$prop->icon,['style'=>'width:25px;margin-right:5px;']).$prop->name)?>
                                                    </li>
                                                <?php endforeach;?>
                                            </ul>
                                        </div>

                                    <?php  endforeach;?>
                                </div>
                                <?php
                                echo \yii\bootstrap4\Html::submitButton("Отправить",['class'=>'btn btn-success']);

                                ?>
                                <?php ActiveForm::end();?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>

            </div>
        </div>
    </div>

</div>
<style>
    .props-list li{
        list-style: none;
    }
</style>
