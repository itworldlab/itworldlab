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
<div class="container">
    <div class="product-page">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item"><a href="/" class="breadcrumbs__link">Главная</a></li>
            <li class="breadcrumbs__item"><a href="<?=\yii\helpers\Url::to(['/product/index','category_id'=>$model->category_id])?>" class="breadcrumbs__link"><?=$model->category->name?></a></li>
            <li class="breadcrumbs__item"><?=$model->name?></li>
        </ul>

        <div class="product__header">
            <div class="product__header-logo"><img src="/uploads/<?=$model->logo?>" alt="<?=$model->name?>"></div>
            <div class="product__header-text">
                <div class="product__header-row">
                    <span class="h3 product__header-name"><?=$model->name?></span>
                    <a href="" class="product__header-link">Посмотреть интеграторов</a>
                </div>
                <div class="product__header-row">
                    <ul class="stars">
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                    </ul>
                    <a href="" class="product__header-link">Узнать цену</a>
                </div>
                <div class="info-row">
                    <span>Использований: <?=$model->install_count?></span><span>Отзывов: <?=$model->rate_count?></span>
                </div>
                <p class="product__header-descript">
                    <?=$model->descr?>
                </p>
            </div>
            <div class="product__header-right">
                <a href="<?=\yii\helpers\Url::to(['product/compare'])?>" class="compareBtn">Добавить в сравнение<svg class="compareBtn__icon"><use xlink:href="/images/dist/sprite.svg#exchange"></use></svg></a>
                <ul class="list-check">
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
        </div>
        <!-- /.product__header -->

        <div class="infoBoxGrid">
            <?php
            $plats = \backend\models\product\PropType::find()
                ->where(['type'=>'platforms'])
                ->orWhere(['type'=>'company_type'])
                ->orWhere(['type'=>'deploy'])
                ->orWhere(['type'=>'pay_type']);
            if(isset($_GET['category_id'])){
                $plats = $plats->andWhere(['category_id'=>Yii::$app->request->get("category_id")]);
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

        <!--<div class="screenshots">
            <span class="screenshots__title">Скриншоты:</span>
            <div class="screenshots-slider js-screenshot-slider">
                <div><a data-fancybox="screenshots" href="/images/dist/screenshot-1.jpg" class="screenshots__link"><img src="/images/dist/screenshot-1.jpg" alt=""></a></div>
                <div><a data-fancybox="screenshots" href="/images/dist/screenshot-2.jpg" class="screenshots__link"><img src="/images/dist/screenshot-1.jpg" alt=""></a></div>
                <div><a data-fancybox="screenshots" href="/images/dist/screenshot-3.jpg" class="screenshots__link"><img src="/images/dist/screenshot-1.jpg" alt=""></a></div>
                <div><a data-fancybox="screenshots" href="/images/dist/screenshot-4.jpg" class="screenshots__link"><img src="/images/dist/screenshot-1.jpg" alt=""></a></div>
                <div><a data-fancybox="screenshots" href="/images/dist/screenshot-1.jpg" class="screenshots__link"><img src="/images/dist/screenshot-1.jpg" alt=""></a></div>
                <div><a data-fancybox="screenshots" href="/images/dist/screenshot-2.jpg" class="screenshots__link"><img src="/images/dist/screenshot-1.jpg" alt=""></a></div>
                <div><a data-fancybox="screenshots" href="/images/dist/screenshot-3.jpg" class="screenshots__link"><img src="/images/dist/screenshot-1.jpg" alt=""></a></div>
                <div><a data-fancybox="screenshots" href="/images/dist/screenshot-4.jpg" class="screenshots__link"><img src="/images/dist/screenshot-1.jpg" alt=""></a></div>
            </div>
        </div>-->

        <ul class="tabs">
            <li class="tabs__item is-active"><a href="#tab1" class="tabs__link">Функционал</a></li>
            <li class="tabs__item"><a href="#tab2" class="tabs__link">Цена и пакеты</a></li>
            <li class="tabs__item"><a href="#tab3" class="tabs__link">Отрасли применения</a></li>
            <li class="tabs__item"><a href="#tab4" class="tabs__link">Совместимость</a></li>
            <li class="tabs__item"><a href="#tab5" class="tabs__link">Интеграторы и партнёры</a></li>
            <li class="tabs__item"><a href="#tab6" class="tabs__link">Отзывы</a></li>
            <li class="tabs__item"><a href="#tab7" class="tabs__link">Аналоги</a></li>
        </ul>
        <div class="tabContent">
            <div class="tabContent__item" id="tab1">
                <div class="gridFourth">
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
                    <div class="tabContent__right"><a class="tabContent__link" href="">Сравнить с аналогами</a></div>
                </div>

            </div>
            <!-- /.tabContent__item -->
            <div class="tabContent__item" id="tab2">
                <div class="package">
                    <div class="package__item">
                        <span class="h3 package__title">Бесплатный</span>
                        <span class="package__text">Начните работать онлайн и продавать больше с CRM</span>
                        <span class="package__price">0 Тг / мес*</span>
                        <button type="button" class="btn btn-orange package__btn-orange">Скачать</button>
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
                    <!-- /.package__item -->
                    <div class="package__item">
                        <span class="h3 package__title">Базовый</span>
                        <span class="package__text">Для эффективной работы небольших компаний и отделов продаж</span>
                        <span class="package__price">1 619 Тг / мес*</span>
                        <button type="button" class="btn btn-orange package__btn-orange">Выбрать интегратора</button>
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
                    <!-- /.package__item -->
                    <div class="package__item">
                        <span class="h3 package__title">Стандартный</span>
                        <span class="package__text">Для совместной работы всей компании или рабочих групп</span>
                        <span class="package__price">3 894 Тг / мес*</span>
                        <button type="button" class="btn btn-orange package__btn-orange">Выбрать интегратора</button>
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
                    <!-- /.package__item -->
                    <div class="package__item">
                        <span class="h3 package__title">Профессиональный</span>
                        <span class="package__text">Для максимальной автоматизации всех процессов в компании</span>
                        <span class="package__price">7 794 Тг / мес**</span>
                        <button type="button" class="btn btn-orange package__btn-orange">Выбрать интегратора</button>
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
                    <!-- /.package__item -->
                </div>
                <!-- /.package -->
            </div>
            <!-- /.tabContent__item -->
            <div class="tabContent__item" id="tab3">
                <ul class="list-dots tabContent__list-dots">
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
            <!-- /.tabContent__item -->
            <div class="tabContent__item" id="tab4">
                <div class="compatibility">
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/bitriks-logo.svg" alt="">
                            </span>
                        <span class="compatibility__name">Битрикс24</span>
                    </a>
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/sap-logo.svg" alt="">
                            </span>
                        <span class="compatibility__name">SAP</span>
                    </a>
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/bitriks-logo.svg" alt="">
                            </span>
                        <span class="compatibility__name">Битрикс24</span>
                    </a>
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/logo-1c.svg" alt="">
                            </span>
                        <span class="compatibility__name">1с бухгалтерия</span>
                    </a>
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/sap-logo.svg" alt="">
                            </span>
                        <span class="compatibility__name">SAP</span>
                    </a>
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/logo-1c.svg" alt="">
                            </span>
                        <span class="compatibility__name">1с бухгалтерия</span>
                    </a>
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/sap-logo.svg" alt="">
                            </span>
                        <span class="compatibility__name">SAP</span>
                    </a>
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/bitriks-logo.svg" alt="">
                            </span>
                        <span class="compatibility__name">Битрикс24</span>
                    </a>
                </div>
                <!-- /.compatibility -->
            </div>
            <!-- /.tabContent__item -->
            <div class="tabContent__item" id="tab5">
                <div class="partner-row">
                    <div class="partner-row__logo"><img src="/images/dist/it-logo.svg" alt=""></div>
                    <div class="partner-row__content">
                        <div class="h3 partner-row__title">IT WORLD LAB</div>
                        <div class="partner-row__grid">
                            <ul class="partner-row__list">
                                <li class="partner-row__list-star">Золотой партнёр</li>
                                <li class="partner-row__list-location">Офис в: Алматы <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></li>
                                <li class="partner-row__list-open">Открыты с: 2008 г.</li>
                            </ul>
                            <ul class="box__gray">
                                <li>Готовых проектов: 1231</li>
                                <li><svg class="like-icon"><use xlink:href="/images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                                <li><svg class="reviews-icon"><use xlink:href="/images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
                            </ul>
                            <p class="partner-row__text">
                                IT WORLD LAB - компания, которая развивается в более 10 сферах деятельности, тем самым обеспечивает комплексную автоматизацию и стандартизацию, реализующие непрерывное управлением бизнеса.
                            </p>
                            <div class="partner-row__right">
                                <span class="price">от 250 000 Т* <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></span>
                                <a href="#" class="partner-row__link">Перейти на сайт</a>
                            </div>
                        </div>
                        <!-- /.partner-row__grid -->

                    </div>
                    <!-- /.partner-row__content -->
                </div>
                <!-- END partner-row -->
                <div class="partner-row">
                    <div class="partner-row__logo"><img src="/images/dist/it-world-lab-small.png" alt=""></div>
                    <div class="partner-row__content">
                        <div class="h3 partner-row__title">IWL</div>
                        <div class="partner-row__grid">
                            <ul class="partner-row__list">
                                <li class="partner-row__list-star">Золотой партнёр</li>
                                <li class="partner-row__list-location">Офис в: Алматы <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></li>
                                <li class="partner-row__list-open">Открыты с: 2008 г.</li>
                            </ul>
                            <ul class="box__gray">
                                <li>Готовых проектов: 1231</li>
                                <li><svg class="like-icon"><use xlink:href="/images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                                <li><svg class="reviews-icon"><use xlink:href="/images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
                            </ul>
                            <p class="partner-row__text">
                                IT WORLD LAB - компания, которая развивается в более 10 сферах деятельности, тем самым обеспечивает комплексную автоматизацию и стандартизацию, реализующие непрерывное управлением бизнеса.
                            </p>
                            <div class="partner-row__right">
                                <span class="price">от 250 000 Т* <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></span>
                                <a href="#" class="partner-row__link">Перейти на сайт</a>
                            </div>
                        </div>
                        <!-- /.partner-row__grid -->

                    </div>
                    <!-- /.partner-row__content -->
                </div>
                <!-- END partner-row -->
                <div class="partner-row">
                    <div class="partner-row__logo"><img src="/images/dist/it-logo.svg" alt=""></div>
                    <div class="partner-row__content">
                        <div class="h3 partner-row__title">IT WORLD LAB</div>
                        <div class="partner-row__grid">
                            <ul class="partner-row__list">
                                <li class="partner-row__list-star">Золотой партнёр</li>
                                <li class="partner-row__list-location">Офис в: Алматы <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></li>
                                <li class="partner-row__list-open">Открыты с: 2008 г.</li>
                            </ul>
                            <ul class="box__gray">
                                <li>Готовых проектов: 1231</li>
                                <li><svg class="like-icon"><use xlink:href="/images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                                <li><svg class="reviews-icon"><use xlink:href="/images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
                            </ul>
                            <p class="partner-row__text">
                                IT WORLD LAB - компания, которая развивается в более 10 сферах деятельности, тем самым обеспечивает комплексную автоматизацию и стандартизацию, реализующие непрерывное управлением бизнеса.
                            </p>
                            <div class="partner-row__right">
                                <span class="price">от 250 000 Т* <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></span>
                                <a href="#" class="partner-row__link">Перейти на сайт</a>
                            </div>
                        </div>
                        <!-- /.partner-row__grid -->

                    </div>
                    <!-- /.partner-row__content -->
                </div>
                <!-- END partner-row -->
                <div class="partner-row">
                    <div class="partner-row__logo"><img src="/images/dist/it-world-lab-small.png" alt=""></div>
                    <div class="partner-row__content">
                        <div class="h3 partner-row__title">IWL</div>
                        <div class="partner-row__grid">
                            <ul class="partner-row__list">
                                <li class="partner-row__list-star">Золотой партнёр</li>
                                <li class="partner-row__list-location">Офис в: Алматы <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></li>
                                <li class="partner-row__list-open">Открыты с: 2008 г.</li>
                            </ul>
                            <ul class="box__gray">
                                <li>Готовых проектов: 1231</li>
                                <li><svg class="like-icon"><use xlink:href="/images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                                <li><svg class="reviews-icon"><use xlink:href="/images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
                            </ul>
                            <p class="partner-row__text">
                                IT WORLD LAB - компания, которая развивается в более 10 сферах деятельности, тем самым обеспечивает комплексную автоматизацию и стандартизацию, реализующие непрерывное управлением бизнеса.
                            </p>
                            <div class="partner-row__right">
                                <span class="price">от 250 000 Т* <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></span>
                                <a href="#" class="partner-row__link">Перейти на сайт</a>
                            </div>
                        </div>
                        <!-- /.partner-row__grid -->

                    </div>
                    <!-- /.partner-row__content -->
                </div>
                <!-- END partner-row -->
            </div>
            <!-- /.tabContent__item -->
            <div class="tabContent__item" id="tab6">
                <div class="reviews">
                    <div class="reviews__header">
                        <button type="button" class="btn btn-orange">Оставить отзыв</button>
                        <div class="reviews__header-item">
                            <span class="reviews__name">Средняя оценка:</span>
                            <ul class="stars">
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                            </ul>
                        </div>
                        <div class="reviews__header-item">
                            <span class="reviews__name">Удобство</span>
                            <ul class="stars">
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                            </ul>
                        </div>
                        <div class="reviews__header-item">
                            <span class="reviews__name">Функционал</span>
                            <ul class="stars">
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                            </ul>
                        </div>
                        <div class="reviews__header-item">
                            <span class="reviews__name">Служба поддержки</span>
                            <ul class="stars">
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                            </ul>
                        </div>
                        <div class="reviews__header-item">
                            <span class="reviews__name">Цена</span>
                            <ul class="stars">
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                            </ul>
                        </div>
                    </div>
                    <span class="reviews__count">Отзывов: 99 999</span>
                    <div class="reviews-grid">
                        <div class="reviews-grid__photo">
                            <img src="/images/dist/no-photo.png" alt="">
                        </div>
                        <div class="reviews-grid__column">
                            <span class="reviews-grid__name h3">Алексей</span>
                            <div class="reviews-grid__time">21 января 2021 г.</div>
                            <div class="reviews-grid__descript">
                                Самая удобная CRM система
                            </div>
                        </div>
                        <!-- /.reviews-grid__column -->
                        <div class="reviews-grid__column">
                            <span class="reviews__name">Плюсы:</span>
                            <div class="reviews-grid__text">Работа в мессенджерах, я это несомненный тренд. Простая и понятная для ввода новых сотрудников. Если вы хотите продаж, это система для Вас</div>
                            <span class="reviews__name">Минусы:</span>
                            <div class="reviews-grid__text">нормально все</div>
                            <span class="reviews__name">В целом:</span>
                            <div class="reviews-grid__text">Мы выбирали из многих систем, и выбрали самый удобный для себя</div>
                        </div>
                        <!-- /.reviews-grid__column -->
                        <div class="reviews-grid__stars">
                            <span class="reviews__name">Удобство</span>
                            <ul class="stars">
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                            </ul>
                            <span class="reviews__name">Функционал</span>
                            <ul class="stars">
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                            </ul>
                            <span class="reviews__name">Служба поддержки</span>
                            <ul class="stars">
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                            </ul>
                            <span class="reviews__name">Цена</span>
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
                            <img src="/images/dist/no-photo.png" alt="">
                        </div>
                        <div class="reviews-grid__column">
                            <span class="reviews-grid__name h3">Алексей</span>
                            <div class="reviews-grid__time">21 января 2021 г.</div>
                            <div class="reviews-grid__descript">
                                Самая удобная CRM система
                            </div>
                        </div>
                        <!-- /.reviews-grid__column -->
                        <div class="reviews-grid__column">
                            <span class="reviews__name">Плюсы:</span>
                            <div class="reviews-grid__text">Работа в мессенджерах, я это несомненный тренд. Простая и понятная для ввода новых сотрудников. Если вы хотите продаж, это система для Вас</div>
                            <span class="reviews__name">Минусы:</span>
                            <div class="reviews-grid__text">нормально все</div>
                            <span class="reviews__name">В целом:</span>
                            <div class="reviews-grid__text">Мы выбирали из многих систем, и выбрали самый удобный для себя</div>
                        </div>
                        <!-- /.reviews-grid__column -->
                        <div class="reviews-grid__stars">
                            <span class="reviews__name">Удобство</span>
                            <ul class="stars">
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                            </ul>
                            <span class="reviews__name">Функционал</span>
                            <ul class="stars">
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                            </ul>
                            <span class="reviews__name">Служба поддержки</span>
                            <ul class="stars">
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                            </ul>
                            <span class="reviews__name">Цена</span>
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
                </div>
                <!-- /.reviews -->
            </div>
            <!-- /.tabContent__item -->
            <div class="tabContent__item" id="tab7">
                <div class="compatibility">
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/bitriks-logo.svg" alt="">
                            </span>
                        <span class="compatibility__name">Битрикс24</span>
                    </a>
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/sap-logo.svg" alt="">
                            </span>
                        <span class="compatibility__name">SAP</span>
                    </a>
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/bitriks-logo.svg" alt="">
                            </span>
                        <span class="compatibility__name">Битрикс24</span>
                    </a>
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/logo-1c.svg" alt="">
                            </span>
                        <span class="compatibility__name">1с бухгалтерия</span>
                    </a>
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/sap-logo.svg" alt="">
                            </span>
                        <span class="compatibility__name">SAP</span>
                    </a>
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/logo-1c.svg" alt="">
                            </span>
                        <span class="compatibility__name">1с бухгалтерия</span>
                    </a>
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/sap-logo.svg" alt="">
                            </span>
                        <span class="compatibility__name">SAP</span>
                    </a>
                    <a href="" class="compatibility__link">
                            <span class="compatibility__row">
                                <img src="/images/dist/bitriks-logo.svg" alt="">
                            </span>
                        <span class="compatibility__name">Битрикс24</span>
                    </a>
                </div>
                <!-- /.compatibility -->
            </div>
            <!-- /.tabContent__item -->
        </div>
        <!-- /.tabContent -->

        <div class="accordeon-mobile">
            <div class="accordeon-mobile__item">
                <div class="accordeon-mobile__title js-accordeon2">Функционал</div>
                <div class="accordeon-mobile__text">
                    <a href="" class="accordeon-mobile__link">Сравнить с аналогами</a>
                    <ul class="list1 accordeon-mobile__list1">
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>Воронка продаж</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>База клиентов</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>Управление заказами</li>
                        <li><svg class="list1__close"><use xlink:href="/images/dist/sprite.svg#close"></use></svg>Продуктовый каталог</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>Колл-центр и телефония</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>История взаимодействия с клиентом</li>
                        <li><svg class="list1__close"><use xlink:href="/images/dist/sprite.svg#close"></use></svg>Системы лояльности</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>Мониторинг эффективности персонала</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>Тайм-менеджмент</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>Управление поддержкой</li>
                        <li><svg class="list1__close"><use xlink:href="/images/dist/sprite.svg#close"></use></svg>Открытый исходный код</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>Отчёты</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>Интеграция с почтой</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>Email-рассылки</li>
                        <li><svg class="list1__close"><use xlink:href="/images/dist/sprite.svg#close"></use></svg>Шаблоны проектов</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>Хранилище файлов</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>Диаграмма Ганта</li>
                        <li><svg class="list1__close"><use xlink:href="/images/dist/sprite.svg#close"></use></svg>Биллинг и счета</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>Экспорт/импорт данных</li>
                        <li><svg class="list1__close"><use xlink:href="/images/dist/sprite.svg#close"></use></svg>Подключение Фис.регистратора</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>API для интеграции</li>
                        <li><svg class="green-check list1__green-check"><use xlink:href="/images/dist/sprite.svg#check"></use></svg>Веб-формы</li>
                    </ul>
                </div>
            </div>
            <!-- /.accordeon-mobile__item -->
            <div class="accordeon-mobile__item">
                <div class="accordeon-mobile__title js-accordeon2">Цена и пакеты</div>
                <div class="accordeon-mobile__text">
                    <div class="package">
                        <div class="package__item">
                            <span class="h3 package__title">Бесплатный</span>
                            <span class="package__text">Начните работать онлайн и продавать больше с CRM</span>
                            <span class="package__price">0 Тг / мес*</span>
                            <button type="button" class="btn btn-orange package__btn-orange">Скачать</button>
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
                        <!-- /.package__item -->
                        <div class="package__item">
                            <span class="h3 package__title">Базовый</span>
                            <span class="package__text">Для эффективной работы небольших компаний и отделов продаж</span>
                            <span class="package__price">1 619 Тг / мес*</span>
                            <button type="button" class="btn btn-orange package__btn-orange">Выбрать интегратора</button>
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
                                <li class="package__list-dot">Поддержка</li>
                            </ul>
                        </div>
                        <!-- /.package__item -->
                        <div class="package__item">
                            <span class="h3 package__title">Стандартный</span>
                            <span class="package__text">Для совместной работы всей компании или рабочих групп</span>
                            <span class="package__price">3 894 Тг / мес*</span>
                            <button type="button" class="btn btn-orange package__btn-orange">Выбрать интегратора</button>
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
                                <li class="package__list-dot">Поддержка</li>
                                <li class="package__list-dot">Администрирование</li>
                            </ul>
                        </div>
                        <!-- /.package__item -->
                        <div class="package__item">
                            <span class="h3 package__title">Профессиональный</span>
                            <span class="package__text">Для максимальной автоматизации всех процессов в компании</span>
                            <span class="package__price">7 794 Тг / мес**</span>
                            <button type="button" class="btn btn-orange package__btn-orange">Выбрать интегратора</button>
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
                        <!-- /.package__item -->
                    </div>
                    <!-- /.package -->
                </div>
                <!-- /.accordeon-mobile__text -->
            </div>
            <!-- /.accordeon-mobile__item -->
            <div class="accordeon-mobile__item">
                <div class="accordeon-mobile__title js-accordeon2">Отрасли применения</div>
                <div class="accordeon-mobile__text">
                    <ul class="list-dots tabContent__list-dots">
                        <li>Ритейл</li>
                        <li>Интернет-магазин</li>
                        <li>Сфера услуг</li>
                        <li>Фитнес клубы</li>
                        <li>Автосервисы</li>
                        <li>Юридические
                            компании</li>
                        <li>Агентства</li>
                        <li>Турагентство</li>
                        <li>Недвижимость</li>
                        <li>Агентство недвижимости</li>
                        <li>Логистика и транспорт</li>
                        <li>Медицина</li>
                        <li>IT-технологии</li>
                        <li>Клиники</li>
                        <li>Врачи</li>
                        <li>Склад</li>
                        <li>Курьерские службы</li>
                        <li>Колл-центр</li>
                        <li>Риэлторы</li>
                        <li>B2B-компании</li>
                        <li>Строительный бизнес</li>
                        <li>Полиграфии</li>
                        <li>Товарный бизнес</li>
                        <li>Франшиза</li>
                        <li>Маркетплейсы</li>
                    </ul>
                </div>
                <!-- /.accordeon-mobile__text -->
            </div>
            <!-- /.accordeon-mobile__item -->
            <div class="accordeon-mobile__item">
                <div class="accordeon-mobile__title js-accordeon2">Совместимость</div>
                <div class="accordeon-mobile__text">
                    <div class="compatibility">
                        <a href="" class="compatibility__link">
                                <span class="compatibility__row">
                                    <img src="/images/dist/bitriks-logo.svg" alt="">
                                </span>
                            <span class="compatibility__name">Битрикс24</span>
                        </a>
                        <a href="" class="compatibility__link">
                                <span class="compatibility__row">
                                    <img src="/images/dist/sap-logo.svg" alt="">
                                </span>
                            <span class="compatibility__name">SAP</span>
                        </a>
                        <a href="" class="compatibility__link">
                                <span class="compatibility__row">
                                    <img src="/images/dist/bitriks-logo.svg" alt="">
                                </span>
                            <span class="compatibility__name">Битрикс24</span>
                        </a>
                        <a href="" class="compatibility__link">
                                <span class="compatibility__row">
                                    <img src="/images/dist/logo-1c.svg" alt="">
                                </span>
                            <span class="compatibility__name">1с бухгалтерия</span>
                        </a>
                        <a href="" class="compatibility__link">
                                <span class="compatibility__row">
                                    <img src="/images/dist/sap-logo.svg" alt="">
                                </span>
                            <span class="compatibility__name">SAP</span>
                        </a>
                        <a href="" class="compatibility__link">
                                <span class="compatibility__row">
                                    <img src="/images/dist/logo-1c.svg" alt="">
                                </span>
                            <span class="compatibility__name">1с бухгалтерия</span>
                        </a>
                    </div>
                    <!-- /.compatibility -->
                </div>
                <!-- /.accordeon-mobile__text -->
            </div>
            <!-- /.accordeon-mobile__item -->
            <div class="accordeon-mobile__item">
                <div class="accordeon-mobile__title js-accordeon2">Интеграторы и партнёры (4)</div>
                <div class="accordeon-mobile__text">
                    <div class="partner-row">
                        <div class="partner-row__logo partner-row__logo-mobile">
                            <img src="/images/dist/it-logo.svg" alt="">
                            <span class="price">от 250 000 Т <svg class="price__faq"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></span>
                        </div>
                        <div class="partner-row__content">
                            <div class="h3 partner-row__title">IT WORLD LAB</div>
                            <a href="#" class="partner-row__link">Перейти на сайт</a>
                            <div class="partner-row__grid">
                                <ul class="partner-row__list">
                                    <li class="partner-row__list-star">Золотой партнёр</li>
                                    <li class="partner-row__list-location">Офис в: Алматы <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></li>
                                    <li class="partner-row__list-open">Открыты с: 2008 г.</li>
                                </ul>

                                <p class="partner-row__text">
                                    IT WORLD LAB - компания, которая развивается в более 10 сферах деятельности, тем самым обеспечивает комплексную автоматизацию и стандартизацию, реализующие непрерывное управлением бизнеса.
                                </p>

                                <ul class="box__gray">
                                    <li>Готовых проектов: 1231</li>
                                    <li><svg class="like-icon"><use xlink:href="/images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                                    <li><svg class="reviews-icon"><use xlink:href="/images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
                                </ul>
                            </div>
                            <!-- /.partner-row__grid -->
                        </div>
                        <!-- /.partner-row__content -->
                    </div>
                    <!-- END partner-row -->
                    <div class="partner-row">
                        <div class="partner-row__logo partner-row__logo-mobile">
                            <img src="/images/dist/it-world-lab-small.png" alt="">
                            <span class="price">от 250 000 Т <svg class="price__faq"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></span>
                        </div>
                        <div class="partner-row__content">
                            <div class="h3 partner-row__title">IT WORLD LAB</div>
                            <a href="#" class="partner-row__link">Перейти на сайт</a>
                            <div class="partner-row__grid">
                                <ul class="partner-row__list">
                                    <li class="partner-row__list-star">Золотой партнёр</li>
                                    <li class="partner-row__list-location">Офис в: Алматы <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></li>
                                    <li class="partner-row__list-open">Открыты с: 2008 г.</li>
                                </ul>

                                <p class="partner-row__text">
                                    IT WORLD LAB - компания, которая развивается в более 10 сферах деятельности, тем самым обеспечивает комплексную автоматизацию и стандартизацию, реализующие непрерывное управлением бизнеса.
                                </p>

                                <ul class="box__gray">
                                    <li>Готовых проектов: 1231</li>
                                    <li><svg class="like-icon"><use xlink:href="/images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                                    <li><svg class="reviews-icon"><use xlink:href="/images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
                                </ul>
                            </div>
                            <!-- /.partner-row__grid -->
                        </div>
                        <!-- /.partner-row__content -->
                    </div>
                    <!-- END partner-row -->
                </div>
                <!-- /.accordeon-mobile__text -->
            </div>
            <!-- /.accordeon-mobile__item -->

            <div class="accordeon-mobile__item">
                <div class="accordeon-mobile__title js-accordeon2">Отзывы (3)</div>
                <div class="accordeon-mobile__text">
                    <div class="reviews reviews--vertical">
                        <div class="reviews__header">
                            <button type="button" class="btn btn-orange reviews__btn-orange">Оставить отзыв</button>
                            <div class="reviews__header-item reviews__header-item--1">
                                <span class="reviews__name">Средняя оценка:</span>
                                <ul class="stars">
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                                </ul>
                            </div>
                            <div class="reviews__header-item reviews__header-item--2">
                                <span class="reviews__name">Удобство</span>
                                <ul class="stars">
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                                </ul>
                            </div>
                            <div class="reviews__header-item reviews__header-item--3">
                                <span class="reviews__name">Функционал</span>
                                <ul class="stars">
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                                </ul>
                            </div>
                            <div class="reviews__header-item reviews__header-item--4">
                                <span class="reviews__name">Служба поддержки</span>
                                <ul class="stars">
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                                </ul>
                            </div>
                            <div class="reviews__header-item reviews__header-item--5">
                                <span class="reviews__name">Цена</span>
                                <ul class="stars">
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                    <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="reviews-grid">
                            <div class="reviews-grid__row">
                                <div class="reviews-grid__photo">
                                    <img src="/images/dist/no-photo.png" alt="">
                                </div>
                                <div class="reviews-grid__column">
                                    <span class="reviews-grid__name h3">Алексей</span>
                                </div>
                            </div>
                            <div class="reviews-grid__time">21 января 2021 г.</div>
                            <div class="reviews-grid__descript">
                                Самая удобная CRM система
                            </div>
                            <div class="reviews-grid__column">
                                <span class="reviews__name">Плюсы:</span>
                                <div class="reviews-grid__text">Работа в мессенджерах, я это несомненный тренд. Простая и понятная для ввода новых сотрудников. Если вы хотите продаж, это система для Вас</div>
                                <span class="reviews__name">Минусы:</span>
                                <div class="reviews-grid__text">нормально все</div>
                                <span class="reviews__name">В целом:</span>
                                <div class="reviews-grid__text">Мы выбирали из многих систем, и выбрали самый удобный для себя</div>
                            </div>
                            <!-- /.reviews-grid__column -->
                            <div class="reviews-grid__stars">
                                <div class="reviews-grid__stars-item">
                                    <span class="reviews__name">Удобство</span>
                                    <ul class="stars">
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                                    </ul>
                                </div>
                                <!-- /.reviews-grid__stars-item -->
                                <div class="reviews-grid__stars-item">
                                    <span class="reviews__name">Функционал</span>
                                    <ul class="stars">
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                                    </ul>
                                </div>
                                <!-- /.reviews-grid__stars-item -->
                                <div class="reviews-grid__stars-item">
                                    <span class="reviews__name">Служба поддержки</span>
                                    <ul class="stars">
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                                    </ul>
                                </div>
                                <!-- /.reviews-grid__stars-item -->
                                <div class="reviews-grid__stars-item">
                                    <span class="reviews__name">Цена</span>
                                    <ul class="stars">
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon"><use xlink:href="/images/dist/sprite.svg#star"></use></svg></a></li>
                                        <li class="stars__item"><a href="" class="stars__link"><svg class="stars__icon stars__icon--black"><use xlink:href="/images/dist/sprite.svg#star-black"></use></svg></a></li>
                                    </ul>
                                </div>
                                <!-- /.reviews-grid__stars-item -->
                            </div>
                            <!-- /.reviews-grid__stars -->
                        </div>
                        <!-- /.reviews-grid -->
                    </div>
                    <!-- /.reviews -->
                </div>
                <!-- /.accordeon-mobile__text -->

            </div>
            <!-- /.accordeon-mobile__item -->
            <div class="accordeon-mobile__item">
                <div class="accordeon-mobile__title js-accordeon2">Аналоги</div>
                <div class="accordeon-mobile__text">
                    <div class="compatibility">
                        <div class="compatibility__link">
                            <a href="">
                                    <span class="compatibility__row">
                                        <img src="/images/dist/bitriks-logo.svg" alt="">
                                    </span>
                                <span class="compatibility__name">Битрикс24</span>
                            </a>
                            <a href="#" class="compare compatibility__compare">Добавить в сравнение <svg class="compare__icon"><use xlink:href="/images/dist/sprite.svg#exchange"></use></svg></a>
                        </div>

                        <div class="compatibility__link">
                            <a href="">
                                    <span class="compatibility__row">
                                        <img src="/images/dist/sap-logo.svg" alt="">
                                    </span>
                                <span class="compatibility__name">SAP</span>
                            </a>
                            <a href="#" class="compare compatibility__compare">Добавить в сравнение <svg class="compare__icon"><use xlink:href="/images/dist/sprite.svg#exchange"></use></svg></a>
                        </div>
                        <div href="" class="compatibility__link">
                            <a href="">
                                   <span class="compatibility__row">
                                        <img src="/images/dist/bitriks-logo.svg" alt="">
                                    </span>
                                <span class="compatibility__name">Битрикс24</span>
                            </a>
                            <a href="#" class="compare compatibility__compare">Добавить в сравнение <svg class="compare__icon"><use xlink:href="/images/dist/sprite.svg#exchange"></use></svg></a>
                        </div>
                        <div href="" class="compatibility__link">
                            <a href="">
                                    <span class="compatibility__row">
                                        <img src="/images/dist/logo-1c.svg" alt="">
                                    </span>
                                <span class="compatibility__name">1с бухгалтерия</span>
                            </a>
                            <a href="#" class="compare compatibility__compare">Добавить в сравнение <svg class="compare__icon"><use xlink:href="/images/dist/sprite.svg#exchange"></use></svg></a>
                        </div>
                        <div href="" class="compatibility__link">
                            <a href="">
                                    <span class="compatibility__row">
                                        <img src="/images/dist/sap-logo.svg" alt="">
                                    </span>
                                <span class="compatibility__name">SAP</span>
                            </a>
                            <a href="#" class="compare compatibility__compare">Добавить в сравнение <svg class="compare__icon"><use xlink:href="/images/dist/sprite.svg#exchange"></use></svg></a>
                        </div>
                        <div class="compatibility__link">
                            <a href="">
                                    <span class="compatibility__row">
                                        <img src="/images/dist/logo-1c.svg" alt="">
                                    </span>
                                <span class="compatibility__name">1с бухгалтерия</span>
                            </a>
                            <a href="#" class="compare compatibility__compare">Добавить в сравнение <svg class="compare__icon"><use xlink:href="/images/dist/sprite.svg#exchange"></use></svg></a>
                        </div>
                        <div href="" class="compatibility__link">
                            <a href="">
                                    <span class="compatibility__row">
                                        <img src="/images/dist/sap-logo.svg" alt="">
                                    </span>
                                <span class="compatibility__name">SAP</span>
                            </a>
                            <a href="#" class="compare compatibility__compare">Добавить в сравнение <svg class="compare__icon"><use xlink:href="/images/dist/sprite.svg#exchange"></use></svg></a>
                        </div>
                        <div href="" class="compatibility__link">
                            <a href="">
                                    <span class="compatibility__row">
                                        <img src="/images/dist/bitriks-logo.svg" alt="">
                                    </span>
                                <span class="compatibility__name">Битрикс24</span>
                            </a>
                            <a href="#" class="compare compatibility__compare">Добавить в сравнение <svg class="compare__icon"><use xlink:href="/images/dist/sprite.svg#exchange"></use></svg></a>
                        </div>
                    </div>
                    <!-- /.compatibility -->
                </div>
                <!-- /.accordeon-mobile__text -->
            </div>
            <!-- /.accordeon-mobile__item -->
        </div>
        <!-- /.accordeon-mobile -->
    </div>
    <!-- /.product-page -->
</div>

