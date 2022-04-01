<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<nav class="fixedMenu" id="fixedMenu">
    <div class="container fixedMenu__container">
        <a href="" class="fixedMenu__left js-toggleClass"><?=$model->name?></a>
        <ul class="fixedMenu__list">
            <li class="fixedMenu__item is-active"><a href="#desc" class="fixedMenu__link">Описание</a></li>
            <li class="fixedMenu__item"><a href="#func" class="fixedMenu__link">Функционал</a></li>
            <li class="fixedMenu__item"><a href="#prices" class="fixedMenu__link">Цена и пакеты</a></li>
            <li class="fixedMenu__item"><a href="#industries" class="fixedMenu__link">Отрасли применения</a></li>
            <li class="fixedMenu__item"><a href="#comp" class="fixedMenu__link">Совместимость</a></li>
            <li class="fixedMenu__item"><a href="#integrators" class="fixedMenu__link">Интеграторы и партнёры</a></li>
            <li class="fixedMenu__item"><a href="#reviews" class="fixedMenu__link">Отзывы</a></li>
            <li class="fixedMenu__item"><a href="#analogs" class="fixedMenu__link">Аналоги</a></li>
        </ul>
    </div>
</nav>
<div class="container">

    <div class="product-page">

        <ul class="breadcrumbs">
            <li class="breadcrumbs__item"><a href="/" class="breadcrumbs__link">Главная</a></li>
            <li class="breadcrumbs__item"><a href="<?=\yii\helpers\Url::to(['/product/index','category_id'=>$model->category_id])?>" class="breadcrumbs__link"><?=$model->category->name?></a></li>
            <li class="breadcrumbs__item"><?=$model->name?></li>
        </ul>

        <div class="product__header">
            <div class="product__header-logo"><img src="/uploads/<?=$model->logo?>" alt="<?=$model->name?> на сайте itworldlab.com"></div>
            <div class="product__header-text">
                <div class="product__header-row">
                    <h5 class="h5 product__header-name"><?=$model->name?></h5>
                </div>
                <div class="product__header-row">
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                    <div class="info-row product__header-info-row">
                        <span class="info-row__item info-row__like">Средняя ценка: 0</span>
                        <span class="info-row__item info-row__comment">Отзывы: <?=$model->rate_count?></span>
                        <span class="info-row__item">Установок: <?=$model->install_count?></span>
                    </div>
                </div>

                <p class="product__header-descript" id="desc">
                    <?=$model->descr?>
                </p>
            </div>
            <div class="product__header-right">
                <div class="product__header-right__item">
                    <span class="from">От:</span>
                    <span class="price">0 ₸*</span>
                    <span class="smallText">
                           *Указана минимальная цена за продукт,
                           конечная цена зависит от количества
                           функционала и сложности интеграции.
                           Конечную цену узнавайте у интеграторов
                           или вендеров
                       </span>
                    <ul class="infoBoxGrid__list">
                        <?php
                        $plats = \backend\models\product\PropType::find()
                            ->where(['type'=>'pay_type'])
                        ->all();
                        foreach($plats as $plat):
                        ?>
                            <?php
                            $props = \backend\models\product\Prop::find()->where(['prop_type_id'=>$plat->id])->all();
                            foreach($props as $prop){
                                $pr = \backend\models\product\ProductProp::findOne(['prop_id'=>$prop->id,'product_id'=>$model->id]);
                                if(!empty($pr)){
                                    echo '<li style="background:url(/uploads/'.$prop->icon.') no-repeat">'.$prop->name.'</li>';
                                }
                            }
                            ?>
                        <?php endforeach?>
                    </ul>
                </div>
                <a href="#" class="product__header-link">Посмотреть интеграторов</a>
                <a href="<?=\yii\helpers\Url::to(['product/compare'])?>" class="product__header-compare compareBtn"><img src="/images/dist/balance-scale.svg" alt="">Добавить в сравнение</a>
                <ul class="list-check product__header-right__list-check">
                    <?php
                    $prop = \backend\models\product\PropType::findOne(['type'=>'product_info']);
                    $props = \backend\models\product\Prop::find()->where(['prop_type_id'=>$prop->id])->all();
                    foreach($props as $prop){
                        $pr = \backend\models\product\ProductProp::findOne(['prop_id'=>$prop->id]);
                        if(!empty($pr)){
                            echo '<li>'.$prop->name.'</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="infoBoxGrid product__infoBoxGrid">
                <?php
                $plats = \backend\models\product\PropType::find()
                    ->where(['type'=>'platforms'])
                    ->orWhere(['type'=>'company_type'])
                    ->orWhere(['type'=>'deploy']);
                if(isset($_GET['category_id'])){
                    $plats = $plats->andWhere(['category_id'=>Yii::$app->request->get("category_id")]);
                }else{
                    $plats = $plats->andWhere(['category_id'=>0]);
                }
                $plats = $plats->all();
                foreach($plats as $plat):
                ?>
                    <div class="infoBoxGrid__item">
                        <span class="infoBoxGrid__title"><?=$plat->name?></span>
                        <ul class="infoBoxGrid__list">
                            <?php
                            $props = \backend\models\product\Prop::find()->where(['prop_type_id'=>$plat->id])->all();
                            foreach($props as $prop){
                                $pr = \backend\models\product\ProductProp::findOne(['prop_id'=>$prop->id,'product_id'=>$model->id]);
                                if(!empty($pr)){
                                    echo '<li style="background:url(/uploads/'.$prop->icon.') no-repeat">'.$prop->name.'</li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                <?php endforeach;?>
            </div>
            <!-- /.infoBoxGrid -->
        </div>
        <!-- /.product__header -->

        <!--<div class="screenshots-wrap">
            <div class="screenshots">
                <img src="/images/dist/screenshot-1.jpg" alt="">
                <div class="screenshots__grid">
                    <img src="/images/dist/screenshot-2.jpg" alt="">
                    <img src="/images/dist/screenshot-2.jpg" alt="">
                    <img src="/images/dist/screenshot-2.jpg" alt="">
                    <img src="/images/dist/screenshot-2.jpg" alt="">
                </div>
            </div>
        </div>-->
        <!-- /.screenshots-wrap -->


        <div class="func" id="func">
            <h2 class="h2 func__title">Функционал <a href="">Сравнить с аналогами</a></h2>
            <div class="func__wrap">
                <?php
                $func = null;
                if(isset($_GET['category_id'])){
                    $func = \backend\models\product\PropType::findOne(['type'=>'func','category_id'=>Yii::$app->request->get("category_id")]);
                }
                if(empty($func) || $func == null){
                    $func = \backend\models\product\PropType::findOne(['type'=>'func']);
                }

                $pps = \backend\models\product\ProductProp::find()->where(['product_id'=>$model->id])
                    ->andWhere(['prop_type_id'=>$func->id])
                    ->select('prop_id')
                    ->asArray()
                    ->all();
                $product_props = [];
                foreach($pps as $item){
                    array_push($product_props,$item['prop_id']);
                }


                $i = 0;
                $col1 = [];
                $col2 = [];
                $col3 = [];

                foreach($func->props as $prop){
                    $i++;
                    if($i < 8){
                        $col1[] = $prop;
                    }elseif($i > 8 && $i < 16){
                        $col2[] = $prop;
                    }elseif($i > 16){
                        $col3[] = $prop;
                    }
                }

                echo $this->render('func_item',['col'=>$col1,'product_props'=>$product_props]);
                echo $this->render('func_item',['col'=>$col2,'product_props'=>$product_props]);
                echo $this->render('func_item',['col'=>$col3,'product_props'=>$product_props]);

                ?>
            </div>
            <!-- /.func__wrap -->
        </div>
        <!-- /.func -->


        <div class="industries" style="padding-left:15px;" id="industries">
            <h2 class="h2">Отрасли применения</h2>
            <div class="industries__wrap">
                <ul class="indusrties__list">
                    <?php
                    $apply_in = \backend\models\product\PropType::findOne(['type'=>'apply_in']);

                    $props = \backend\models\product\Prop::find()->where(['prop_type_id'=>$apply_in->id])->all();
                    foreach($props as $prop){
                        $pr = \backend\models\product\ProductProp::findOne(['prop_id'=>$prop->id,'product_id'=>$model->id]);
                        if(!empty($pr)){
                            echo '<li>'.$prop->name.'</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
            <!-- /.industries__wrap -->
        </div>
        <!-- /.industries -->

        <!--<div class="prices" id="prices">
            <h2 class="h2">Цена и пакеты</h2>
            <div class="package">
                <div class="package__item">
                    <span class="h3 package__title">Бесплатный</span>
                    <span class="package__text">Начните работать онлайн и продавать больше с CRM</span>
                    <span class="package__price">0 Тг / мес*</span>
                    <button type="button" class="orangeBtn package__orangeBtn">Выбрать интегратора</button>
                    <ul class="package__list">
                        <li class="package__list-dot">Неограниченно
                            пользователей</li>
                        <li class="package__list-dot">5 Гб</li>
                        <li class="package__list-dot">Совместная работа</li>
                        <li class="package__list-dot">Задачи и Проекты</li>
                        <li class="package__list-dot">CRM</li>
                        <li class="package__list-dot">Диск</li>
                        <li class="package__list-dot">Контакт - центр</li>
                        <li class="package__list-dot">Сайты</li>
                    </ul>
                </div>
                <div class="package__item">
                    <span class="h3 package__title">Базовый</span>
                    <span class="package__text">Для эффективной работы небольших компаний и отделов продаж</span>
                    <span class="package__price">0 Тг / мес*</span>
                    <button type="button" class="orangeBtn package__orangeBtn">Выбрать интегратора</button>
                    <ul class="package__list">
                        <li class="package__list-dot">5 пользователей</li>
                        <li class="package__list-dot">24 Гб</li>
                        <li class="package__list-dot">Совместная работа</li>
                        <li class="package__list-dot">Задачи и Проекты</li>
                        <li class="package__list-dot">CRM</li>
                        <li class="package__list-dot">Диск</li>
                        <li class="package__list-dot">Контакт - центр</li>
                        <li class="package__list-dot">Сайты</li>
                        <li class="package__list-dot">Интернет - магазин</li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li class="package__list-dot">Поддержка</li>
                    </ul>
                </div>
                <div class="package__item">
                    <span class="h3 package__title">Стандартный</span>
                    <span class="package__text">Для совместной работы всей компании или рабочих групп</span>
                    <span class="package__price">0 Тг / мес*</span>
                    <button type="button" class="orangeBtn package__orangeBtn">Выбрать интегратора</button>
                    <ul class="package__list">
                        <li class="package__list-dot">50 пользователей</li>
                        <li class="package__list-dot">100 Гб</li>
                        <li class="package__list-dot">Совместная работа</li>
                        <li class="package__list-dot">Задачи и Проекты</li>
                        <li class="package__list-dot">CRM</li>
                        <li class="package__list-dot">Диск</li>
                        <li class="package__list-dot">Контакт - центр</li>
                        <li class="package__list-dot">Сайты</li>
                        <li class="package__list-dot">Интернет - магазин</li>
                        <li class="package__list-dot">Маркетинг</li>
                        <li class="package__list-dot">Документы Онлайн</li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li class="package__list-dot">Поддержка</li>
                        <li class="package__list-dot">Администрирование</li>
                    </ul>
                </div>
                <div class="package__item">
                    <span class="h3 package__title">Профессиональный</span>
                    <span class="package__text">Для максимальной автоматизации всех процессов в компании</span>
                    <span class="package__price">0 Тг / мес**</span>
                    <button type="button" class="orangeBtn package__orangeBtn">Выбрать интегратора</button>
                    <ul class="package__list">
                        <li class="package__list-dot">Неограниченно
                            пользователей</li>
                        <li class="package__list-dot">1 024 Гб</li>
                        <li class="package__list-dot">Совместная работа</li>
                        <li class="package__list-dot">Задачи и Проекты</li>
                        <li class="package__list-dot">CRM</li>
                        <li class="package__list-dot">Диск</li>
                        <li class="package__list-dot">Контакт - центр</li>
                        <li class="package__list-dot">Сайты</li>
                        <li class="package__list-dot">Интернет - магазин</li>
                        <li class="package__list-dot">Маркетинг</li>
                        <li class="package__list-dot">Документы Онлайн</li>
                        <li class="package__list-dot">Сквозная аналитика</li>
                        <li class="package__list-dot">Автоматизация Бизнеса</li>
                        <li class="package__list-dot">HR</li>
                        <li class="package__list-dot">Поддержка</li>
                        <li class="package__list-dot">Администрирование</li>
                    </ul>
                </div>
            </div>
        </div>-->


        <?php if(count($compatibility) > 0):?>
        <div class="compatibility" id="comp">
            <h2 class="h2">Совместимость</h2>
            <p class="subtitle">Совместим с <?=count($compatibility)?> сервисами:</p>
            <div class="compatibility__wrap">
                <?php foreach($compatibility as $comp):?>
                    <a href="<?=\yii\helpers\Url::to(['/product/view','id'=>$comp->comp_product_id])?>" class="compatibility__item">
                        <div class="compatibility__row">
                            <img src="/uploads/<?=$comp->compProduct->logo?>" alt="<?=$comp->compProduct->name?>" style="height: 60px;">
                        </div>
                        <span class="compatibility__name"><?=$comp->compProduct->name?></span>
                        <span class="compatibility__crm"><svg class="compatibility__svg"><use xlink:href="/images/dist/sprite.svg#chart"></use></svg><?=$comp->product->category->name?></span>
                    </a>
                <?php endforeach?>
            </div>

            <?php if(count($compatibility) > 10):?>
            <a href="" class="compatibility__showBtn showBtn">Показать все совместимые продукты</a>
            <?php endif?>
        </div>
        <?php endif?>
        <!-- /.compatibility -->

        <div class="partner" id="integrators">
            <h2 class="h2">Интеграторы и партнёры</h2>
            <p class="subtitle partner__subtitle">Всего интеграторов: 12</p>
            <div class="partner__wrap">
                <div class="partner-row">
                    <div class="partner-row__header">
                        <div class="partner-row__name">IT WORLD LAB</div>
                        <a href="" class="product__header-compare compareBtn"><img src="/images/dist/Exchange.svg" alt="">Добавить в сравнение</a>
                    </div>

                    <div class="partner-row__grid">
                        <div class="partner-grid__logo"><img src="/images/dist/it-logo.png" alt=""></div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Локация и опыт:</span>
                            <ul class="partner-row__list">
                                <li class="partner-row__list-location">Офис в: Алматы <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></li>
                                <li class="partner-row__list-open">Открыты с: 2008 г.</li>
                            </ul>
                        </div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Отзывы и оценки:</span>
                            <ul class="info-row info-row--vertical">
                                <li>
                                    <ul class="stars">
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="info-row__item info-row__like">Средняя ценка: 9 341</span>
                                </li>
                                <li>
                                    <span class="info-row__item info-row__comment">Отзывы: 123</span>
                                </li>

                            </ul>
                        </div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Отзывы и оценки:</span>
                            <p class="partner-row__text">
                                IT WORLD LAB - компания, которая развивается в более 10 сферах деятельности, тем самым обеспечивает комплексную автоматизацию и стандартизацию, реализующие непрерывное...
                            </p>
                        </div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Статус интегратора:</span>
                            <div class="goldStar">Золотой партнёр</div>
                        </div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Цена:</span>
                            <span class="price">от 250 000 Т* <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></span>
                            <p class="partner-row__text">Конечную цену узнавайте у интеграторов или вендеров</p>
                        </div>
                    </div>
                    <!-- /.partner-row__grid -->
                </div>
                <!-- /.partner-row -->
                <div class="partner-row">
                    <div class="partner-row__header">
                        <div class="partner-row__name">IT WORLD LAB</div>
                        <a href="" class="product__header-compare compareBtn"><img src="/images/dist/Exchange.svg" alt="">Добавить в сравнение</a>
                    </div>

                    <div class="partner-row__grid">
                        <div class="partner-grid__logo"><img src="/images/dist/it-logo.png" alt=""></div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Локация и опыт:</span>
                            <ul class="partner-row__list">
                                <li class="partner-row__list-location">Офис в: Алматы <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></li>
                                <li class="partner-row__list-open">Открыты с: 2008 г.</li>
                            </ul>
                        </div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Отзывы и оценки:</span>
                            <ul class="info-row info-row--vertical">
                                <li>
                                    <ul class="stars">
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="info-row__item info-row__like">Средняя ценка: 9 341</span>
                                </li>
                                <li>
                                    <span class="info-row__item info-row__comment">Отзывы: 123</span>
                                </li>

                            </ul>
                        </div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Отзывы и оценки:</span>
                            <p class="partner-row__text">
                                IT WORLD LAB - компания, которая развивается в более 10 сферах деятельности, тем самым обеспечивает комплексную автоматизацию и стандартизацию, реализующие непрерывное...
                            </p>
                        </div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Статус интегратора:</span>
                            <div class="goldStar">Золотой партнёр</div>
                        </div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Цена:</span>
                            <span class="price">от 250 000 Т* <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></span>
                            <p class="partner-row__text">Конечную цену узнавайте у интеграторов или вендеров</p>
                        </div>
                    </div>
                    <!-- /.partner-row__grid -->
                </div>
                <!-- /.partner-row -->
                <div class="partner-row">
                    <div class="partner-row__header">
                        <div class="partner-row__name">IT WORLD LAB</div>
                        <a href="" class="product__header-compare compareBtn"><img src="/images/dist/Exchange.svg" alt="">Добавить в сравнение</a>
                    </div>

                    <div class="partner-row__grid">
                        <div class="partner-grid__logo"><img src="/images/dist/it-logo.png" alt=""></div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Локация и опыт:</span>
                            <ul class="partner-row__list">
                                <li class="partner-row__list-location">Офис в: Алматы <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></li>
                                <li class="partner-row__list-open">Открыты с: 2008 г.</li>
                            </ul>
                        </div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Отзывы и оценки:</span>
                            <ul class="info-row info-row--vertical">
                                <li>
                                    <ul class="stars">
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="info-row__item info-row__like">Средняя ценка: 9 341</span>
                                </li>
                                <li>
                                    <span class="info-row__item info-row__comment">Отзывы: 123</span>
                                </li>

                            </ul>
                        </div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Отзывы и оценки:</span>
                            <p class="partner-row__text">
                                IT WORLD LAB - компания, которая развивается в более 10 сферах деятельности, тем самым обеспечивает комплексную автоматизацию и стандартизацию, реализующие непрерывное...
                            </p>
                        </div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Статус интегратора:</span>
                            <div class="goldStar">Золотой партнёр</div>
                        </div>
                        <div class="partner-grid__column">
                            <span class="partner-grid__title">Цена:</span>
                            <span class="price">от 250 000 Т* <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></span>
                            <p class="partner-row__text">Конечную цену узнавайте у интеграторов или вендеров</p>
                        </div>
                    </div>
                    <!-- /.partner-row__grid -->
                </div>
                <!-- /.partner-row -->
            </div>
            <!-- /.partner__wrap -->

            <a href="" class="partner__showBtn showBtn">Показать всех интеграторов</a>
        </div>
        <!-- /.partner -->

        <div class="reviews" id="reviews">
            <h2 class="h2">Отзывы</h2>
            <div class="info-row reviews__info-row">
                <span class="info-row__item info-row__like">Средняя ценка: 9 341</span>
                <span class="info-row__item info-row__comment">Отзывы: 123</span>
            </div>
            <div class="reviews__header">
                <div class="reviews__header-col">
                    <button type="button" class="blueBtn reviews__header-blueBtn">Оставить отзыв</button>
                    <div class="reviews__header-item">
                        <div class="reivews__header-title">Удобство</div>
                        <ul class="reviews__header-stars stars">
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                        </ul>
                    </div>
                    <div class="reviews__header-item">
                        <div class="reivews__header-title">Функционал</div>
                        <ul class="reviews__header-stars stars">
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                        </ul>
                    </div>
                    <div class="reviews__header-item">
                        <div class="reivews__header-title">Служба поддержки</div>
                        <ul class="reviews__header-stars stars">
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                        </ul>
                    </div>
                    <div class="reviews__header-item">
                        <div class="reivews__header-title">Цена</div>
                        <ul class="reviews__header-stars stars">
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                            <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.reviews__header-col -->

                <div class="reviews__header-item">
                    <div class="reivews__header-title">Средняя оценка:</div>
                    <ul class="reviews__header-stars stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                </div>
            </div>

            <div class="reviews-grid">
                <div class="reviews-grid__photo">
                    <img src="/images/dist/no-photo.jpg" alt="">
                </div>
                <div class="reviews-grid__column">
                    <strong class="reviews-grid__name">Алексей</strong>
                    <div class="reviews-grid__descript">
                        Самая удобная CRM система
                    </div>
                    <div class="reviews-grid__time">21 января 2021 г.</div>
                </div>
                <!-- /.reviews-grid__column -->
                <div class="reviews-grid__column reviews-grid__column--descript">
                    <span class="reviews__name">Плюсы:</span>
                    <div class="reviews-grid__text">Работа в мессенджерах, я это несомненный тренд. Простая и понятная для ввода новых сотрудников. Если вы хотите продаж, это система для Вас</div>
                    <span class="reviews__name">Минусы:</span>
                    <div class="reviews-grid__text">нормально все</div>
                    <span class="reviews__name">В целом:</span>
                    <div class="reviews-grid__text">Мы выбирали из многих систем, и выбрали самый удобный для себя</div>
                </div>
                <!-- /.reviews-grid__column -->
                <div class="reviews-grid__stars">
                    <span class="reviews-grid__title">Удобство</span>
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                    <span class="reviews-grid__title">Функционал</span>
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                    <span class="reviews-grid__title">Служба поддержки</span>
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                    <span class="reviews-grid__title">Цена</span>
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                </div>
                <!-- /.reviews-grid__stars -->
            </div>
            <!-- /.reviews-grid -->
            <div class="reviews-grid">
                <div class="reviews-grid__photo">
                    <img src="/images/dist/ilya.png" alt="">
                </div>
                <div class="reviews-grid__column">
                    <strong class="reviews-grid__name">Илья Панин</strong>
                    <div class="reviews-grid__descript">
                        не ведитесь на пиар - не работает!
                    </div>
                    <div class="reviews-grid__time">21 января 2021 г.</div>
                </div>
                <!-- /.reviews-grid__column -->
                <div class="reviews-grid__column reviews-grid__column--descript">
                    <span class="reviews__name">Плюсы:</span>
                    <div class="reviews-grid__text">красиво упаковано.</div>
                    <span class="reviews__name">Минусы:</span>
                    <div class="reviews-grid__text">функционал телефонного справочника с напоминаниями и некоторыми местячковыми интеграциями. Категорически не рекомендую связываться с амосрм если вы работаете не в москвовском часовом поясе. Пример, я в Сибири, +4 часа к москвовскому времени. В 8 утра открывается офис и...амосрм пустая тыква, часть пользователей пропала, данных нет в системе. По всем каналам пишу-звоню в поддержку - ответ, что работают с 8 часов по москве. ОК! Сейчас 14 часов, мой вопрос не решается, при дозвоне говорят ждите, все остальные каналы молчат. 6 часов рабочего дня уже не работаем, т.к. все завязано на амосрам.</div>
                    <span class="reviews__name">В целом:</span>
                    <div class="reviews-grid__text">Мы выбирали из многих систем, и выбрали самый удобный для себя</div>
                </div>
                <!-- /.reviews-grid__column -->
                <div class="reviews-grid__stars">
                    <span class="reviews-grid__title">Удобство</span>
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                    <span class="reviews-grid__title">Функционал</span>
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                    <span class="reviews-grid__title">Служба поддержки</span>
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                    <span class="reviews-grid__title">Цена</span>
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                </div>
                <!-- /.reviews-grid__stars -->
            </div>
            <!-- /.reviews-grid -->
            <div class="reviews-grid">
                <div class="reviews-grid__photo">
                    <img src="/images/dist/no-photo.jpg" alt="">
                </div>
                <div class="reviews-grid__column">
                    <strong class="reviews-grid__name">Алексей</strong>
                    <div class="reviews-grid__descript">
                        Самая удобная CRM система
                    </div>
                    <div class="reviews-grid__time">21 января 2021 г.</div>
                </div>
                <!-- /.reviews-grid__column -->
                <div class="reviews-grid__column reviews-grid__column--descript">
                    <span class="reviews__name">Плюсы:</span>
                    <div class="reviews-grid__text">Работа в мессенджерах, я это несомненный тренд. Простая и понятная для ввода новых сотрудников. Если вы хотите продаж, это система для Вас</div>
                    <span class="reviews__name">Минусы:</span>
                    <div class="reviews-grid__text">нормально все</div>
                    <span class="reviews__name">В целом:</span>
                    <div class="reviews-grid__text">Мы выбирали из многих систем, и выбрали самый удобный для себя</div>
                </div>
                <!-- /.reviews-grid__column -->
                <div class="reviews-grid__stars">
                    <span class="reviews-grid__title">Удобство</span>
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                    <span class="reviews-grid__title">Функционал</span>
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                    <span class="reviews-grid__title">Служба поддержки</span>
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                    <span class="reviews-grid__title">Цена</span>
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                </div>
                <!-- /.reviews-grid__stars -->
            </div>
            <!-- /.reviews-grid -->
            <a href="" class="reviews__showBtn showBtn">Показать все отзывы</a>
        </div>
        <!-- /.reviews -->

        <div class="analogues" id="analogs">
            <h2 class="h2">Аналоги</h2>
            <p class="subtitle analogues__subtitle">Похож на <?=count($analogs)?> продуктов</p>
            <div class="compatibility__wrap compatibility__wrap-fourth">
                <?php foreach($analogs as $analog):?>
                <div class="compatibility__item">
                    <div class="compatibility__row">
                        <img src="/uploads/<?=$analog->analogProduct->logo?>" alt="<?=$analog->analogProduct->name?>">
                    </div>
                    <span class="compatibility__name"><?=$analog->analogProduct->name?></span>
                    <a href="" class="compareBtn compareBtn--rightImg">Добавить в сравнение <img src="/images/dist/Exchange.svg" alt="<?=$analog->analogProduct->name?>"></a>
                    <a href="<?=\yii\helpers\Url::to(['/product/view','id'=>$analog->analog_product_id])?>" class="compareBtn compareBtn--rightImg">Подробнее <img src="/images/dist/Menu.svg" alt="<?=$analog->analogProduct->name?>"></a>
                </div>
                <?php endforeach?>
            </div>
            <?php if(count($analogs) > 10):?>
            <a href="" class="analogues__showBtn showBtn">Показать все аналоги</a>
            <?php endif?>
        </div>
        <!-- /.analogues -->
    </div>
    <!-- /.product-page -->
</div>
