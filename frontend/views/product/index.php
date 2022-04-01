<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('product','menu_title');
$this->params['breadcrumbs'][] = $this->title;

$plat = \backend\models\product\PropType::findOne(['type'=>'platforms']);
$company_type = \backend\models\product\PropType::findOne(['type'=>'company_type']);
$pay_type = \backend\models\product\PropType::findOne(['type'=>'pay_type']);
$deploy = \backend\models\product\PropType::findOne(['type'=>'deploy']);
$cats = \backend\models\product\ProductCategory::find()->all();


?>
<div class="container">
    <div class="catalog-services">
        <div class="filter">
            <div class="filter__result">6 результатов</div>
            <button type="button" class="whiteBtn filter__whiteBtn">Очистить фильтры</button>
            <form class="filter__search" action="#" method="get">
                <button type="submit" class="filter__search-submit"><svg class="filter__search-icon"><use xlink:href="/images/dist/sprite.svg#loupe"></use></svg></button>
                <input type="text" placeholder="Поиск продукта по названию" class="filter__search-input" required>
            </form>
            <div class="filter__item">
                <div class="filter__title">Интеграция:</div>
                <?php foreach($cats as $cat):?>
                    <input type="checkbox" class="filter__checkbox" id="cat<?=$cat->id?>">
                    <label for="cat<?=$cat->id?>" class="filter__label"><svg class="filter__svg"><use xlink:href="/uploads/<?=$cat->icon?>"></use></svg><?=$cat->name?></label>
                <?php endforeach;?>
            </div>
            <!-- /.filter__item -->

            <div class="filter__item">
                <div class="filter__title">Интегрируемое ПО:</div>
                <input type="checkbox" class="filter__checkbox" id="check-9">
                <label for="check-9" class="filter__label"><img src="/images/dist/bitrix24.png" alt="" class="filter__label-img">Bitrix 24</label>

                <input type="checkbox" class="filter__checkbox" id="check-10">
                <label for="check-10" class="filter__label"><img src="/images/dist/1C_Company_logo.jpg" alt="" class="filter__label-img">1С CRM</label>

                <input type="checkbox" class="filter__checkbox" id="check-11">
                <label for="check-11" class="filter__label"><img src="/images/dist/SAP.png" alt="" class="filter__label-img">SAP</label>

                <input type="checkbox" class="filter__checkbox" id="check-12">
                <label for="check-12" class="filter__label"><img src="/images/dist/it-logo.png" alt="" class="filter__label-img">1С Бухгалтерия</label>

                <a href="" class="showAllBtn filter__showAllBtn">Посмотреть все <svg class="showAllBtn__icon"><use xlink:href="/images/dist/sprite.svg#caret-big-right"></use></svg></a>
            </div>
            <!-- /.filter__item -->

            <div class="filter__item">
                <div class="filter__title">Опыт работы:</div>

                <div class="chooseFilter">
                    <div class="chooseFilter__row">
                        <div class="chooseFilter__row-item">от <input class="chooseFilter__input js-from" value="1" type="text" disabled> года</div>
                        <div class="chooseFilter__row-item">до <input class="chooseFilter__input js-to" value="30" type="text" disabled>лет</div>

                    </div>
                    <input class="js-range-slider" type="text" id="price_select" name="price_select" value="" />
                </div>

            </div>
            <!-- /.filter__item -->
            <div class="filter__item">
                <div class="filter__title">Локация</div>
                <a class="location-link" href=""><svg class="location-link__icon"><use xlink:href="/images/dist/sprite.svg#location"></use></svg><span>Алматы, Казахстан</span></a>
            </div>
            <!-- /.filter__item -->
        </div>
        <!-- /.filter -->
        <div class="catalog-services__content">
            <?php
            echo \yii\widgets\ListView::widget([
                'dataProvider' => $productsDataProvider,
                'itemView' => '@frontend/components/product/_list_item',
                'summary' => false,
            ]);
            ?>
        </div>
        <!-- /.catalog-services__content -->
    </div>
    <!-- /.catalog-services -->

</div>
