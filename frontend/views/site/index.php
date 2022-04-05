<?php

/* @var $this yii\web\View */

use kartik\select2\Select2;
use evgeniyrru\yii2slick\Slick;
use yii\web\JsExpression;
use yii\bootstrap4\Html;

?>
<div class="section-slider">
    <div class="slider-main">
        <div class="main-img"></div>
        <!-- Slider main container -->
        <div class="swiper js-swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php foreach($slides as $slide):?>
                <div class="swiper-slide">
                    <picture>
                        <source srcset="/uploads/<?=$slide->image?>" media="(max-width: 576px)">
                        <img src="/uploads/<?=$slide->image?>" class="swiper-slide__img" alt="">
                    </picture>
                </div>
                <?php endforeach?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"><svg class="swiper-button-prev__svg"><use xlink:href="/images/dist/sprite.svg#caret-big-left"></use></svg></div>
            <div class="swiper-button-next"><svg class="swiper-button-prev__svg"><use xlink:href="/images/dist/sprite.svg#caret-big-right"></use></svg></div>
        </div>
        <div class="container slider-main__container">
            <ul class="slider-btns">
                <?php foreach($slides as $slide):?>
                <li class="slider-btns__item" data-slide="<?=$slide->id?>">
                    <strong class="slider-btns__title"><?=$slide->title?></strong>
                    <span class="slider-btns__descript">
                                <?=$slide->descr?>
                            </span>
                    <span class="slider-btns__blue"></span>
                </li>
                <?php endforeach?>
            </ul>
        </div>
        <!-- /.container slider-main__container -->
    </div>
    <!-- /.slider-main -->
    <div class="slider-main-text">
        <div class="slider-main-text__wrapper">
            <div class="container slider-main-text__container">
                <div class="header__bottom">
                    <?=Yii::t("app","head_text")?>
                </div>
            </div>

            <div class="swiper js-slider-main-text">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach($slides as $slide):?>
                    <div class="swiper-slide">
                        <div class="container swiper-slide__container">
                            <div class="title-1"><?=$slide->title?></div>
                            <div class="swiper-slide__subtitle"><?=$slide->subtitle?></div>
                            <a href="<?=$slide->link?>" class="goldBtn swiper-slide__goldBtn"><?=Yii::t("index","more")?></a>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <!-- /.slider-main-text__wrapper -->

    </div>
    <!-- /.slider-main-text -->
</div>

<section class="popular-section">
    <div class="container popular-section__container">
        <h2 class="h2"><?=Yii::t("index","popular")?></h2>
        <div class="popular-section__wrap">
            <?php foreach($products as $product):?>
            <a href="<?=\yii\helpers\Url::to(['/product/view','id'=>$product->id])?>" class="product-item">
                <div class="product-item__header">
                    <img src="/uploads/<?=$product->logo?>" class="product-item__logo" alt="">
                    <div class="product-item__header-col">
                        <h6 class="h6 product-item__title"><?=$product->name?></h6>
                        <div class="info-row product-item__info-row">
                            <span class="info-row__item info-row__like"><?=Yii::t("product","average_rate")?>: <?=$product->rate_average?></span>
                            <span class="info-row__item info-row__comment"><?=Yii::t("product","reviews")?>: <?=$product->install_count?></span>
                        </div>
                    </div>
                </div>

                <p class="product-item__descript">
                    <?=$product->short_descr?>
                </p>
                <span class="compatibility__crm"><svg class="compatibility__svg"><use xlink:href="/images/dist/sprite.svg#chart"></use></svg><?=$product->category->name?></span>
            </a>
            <?php endforeach;?>
        </div>
        <!-- /.popular-section__wrap -->

    </div>
    <!-- /.container popular-section__container -->
</section>


<section class="need">
    <div class="container need__container">
        <h2 class="h2 need__title"><?=Yii::t("index","need_text")?></h2>
        <div class="links">
            <?php foreach($tags as $tag):?>
            <a href="<?=\yii\helpers\Url::to([$tag->link])?>" class="links__item"><?=$tag->name?></a>
            <?php endforeach?>
        </div>
        <!-- /.links -->
        <!--<a href="" class="goldBtn need__goldBtn">Найти свой вариант</a>-->
    </div>
    <!-- /.container need__container -->
</section>

<section class="integrator">
    <div class="container integrator__container">
        <h2 class="h2 integrator__title title-more"><?=Yii::t("index","best_integrators")?> <a href="" class="title-more__link"><?=Yii::t("index","more")?> <svg class="title-more__icon"><use xlink:href="/images/dist/sprite.svg#caret-big-right"></use></svg></a></h2>

        <div class="integrator__wrap">
            <?php foreach($companies as $company):?>
            <div class="integrator__item">
                <img src="/uploads/<?=$company->logo_image?>" class="integrator__logo" alt="">
                <div class="integrator__name"><?=$company->name?></div>
                <ul class="info-row info-row--vertical integrator__info-row">
                    <li>
                        <span class="info-row__item info-row__like"><?=Yii::t("product","average_rate")?>: <?=$company->average_rate?></span>
                    </li>
                    <li>
                        <span class="info-row__item info-row__comment"><?=Yii::t("product","reviews")?>: <?=$company->projects_count?></span>
                    </li>
                    <li class="partner-row__list-location info-row__item"><?=Yii::t("integrator","location")?>: <?=$company->region->name?> <svg class="partner-row__faq-icon"><use xlink:href="/images/dist/sprite.svg#faq"></use></svg></li>
                </ul>
                <hr/>
                <div class="">
                    <!--<div class="box__name">Интегрируемое ПО: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="/images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="/images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="/images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>-->
                    <a href="<?=\yii\helpers\Url::to(['/company/view','id'=>$company->id])?>" class="box__link"><?=Yii::t("index","more")?>...</a>
                </div>
            </div>
            <?php endforeach?>
        </div>
        <!-- /.integrator__wrap -->
    </div>
    <!-- /.container integrator__container -->
</section>

<section class="news">
    <div class="container news__container">
        <h2 class="h2 news__title title-more"><?=Yii::t("menu","news")?> <a href="" class="title-more__link"><?=Yii::t("index","more")?> <svg class="title-more__icon"><use xlink:href="/images/dist/sprite.svg#caret-big-right"></use></svg></a></h2>
        <div class="news__grid">
            <?php foreach($posts as $post):?>
            <a href="<?=\yii\helpers\Url::to(['/news/view','id'=>$post->id])?>" class="news__grid-item">
                <img src="/uploads/<?=$post->image?>" class="news__grid-img" alt="">
                <h6 class="h6 news__title"><?=$post->title?></h6>
                <p class="news__descript">
                    <?=mb_substr($post->descr,0,100);?>
                </p>
                <!--<div class="hashtags">
                    <a href="">#ключевые_слова</a>
                    <a href="">#ключевые_слова</a>
                    <a href="">#ключевые_слова</a>
                </div>-->
               <!-- <div class="news__data">
                    <span>80 просмотров</span>
                    <span>14.12.2021</span>
                </div>-->
            </a>
            <?php endforeach?>
        </div>
        <!-- /.news__grid -->
    </div>
    <!-- /.container news__container -->
</section>

<section class="resume">
    <div class="container resume__container">
        <h2 class="h2 resume__title"><?=Yii::t("index","sli_title")?></h2>
        <p class="resume__descript"><?=Yii::t("index","sli_text")?></p>
        <a href="" class="goldBtn resume__goldBtn"><?=Yii::t("app","register")?></a>
    </div>
    <!-- /.container resume__container -->
</section>

<section class="container itworldlab">
    <h2 class="h2 itworldlab__title"><?=Yii::t("index","sli2_title")?></h2>
    <?=Yii::t("index","sli2_text")?>
    <a href="" class="goldBtn itworldlab__goldBtn"><?=Yii::t("index","more")?></a>
</section>

<section class="allproducts">
    <div class="container allprooducts__container">
        <h2 class="h2 allproducts__title"><?=Yii::t("index","all_products")?></h2>
        <div class="allproducts__grid">
            <div class="allproducts__grid-col">
                <h5 class="h5 allproducts__grid-title"><?=Yii::t("menu","products")?></h5>
                <ul class="listMenu">
                    <li><a href="">CRM</a></li>
                    <li><a href="">BPM</a></li>
                    <li><a href="">WMS</a></li>
                    <li><a href="">ERP</a></li>
                    <li><a href="">IaaS</a></li>
                </ul>
            </div>
            <div class="allproducts__grid-col">
                <h5 class="h5 allproducts__grid-title"><?=Yii::t("menu","services")?></h5>
                <ul class="listMenu">
                    <li><a href=""><?=Yii::t("menu","integrations")?></a></li>
                    <li><a href=""><?=Yii::t("menu","consulting")?></a></li>
                    <li><a href=""><?=Yii::t("menu","website_development")?></a></li>
                    <li><a href=""><?=Yii::t("menu","software_development")?></a></li>
                    <li><a href=""><?=Yii::t("menu","autsorsing")?></a></li>
                    <li><a href=""><?=Yii::t("menu","support")?></a></li>
                </ul>
            </div>
            <div class="allproducts__grid-col">
                <h5 class="h5 allproducts__grid-title"><?=Yii::t("menu","cources")?></h5>
                <ul class="listMenu">
                    <li><a href=""><?=Yii::t("menu","lvl_up")?></a></li>
                    <li><a href=""><?=Yii::t("menu","learn_from_zero")?></a></li>
                    <li><a href=""><?=Yii::t("menu","learn_empl")?></a></li>
                </ul>
            </div>
            <div class="allproducts__grid-col">
                <h5 class="h5 allproducts__grid-title"><?=Yii::t("index","more")?></h5>
                <ul class="listMenu">
                    <li><a href=""><?=Yii::t("menu","register_product")?></a></li>
                    <li><a href=""><?=Yii::t("menu","register_developer")?></a></li>
                    <li><a href=""><?=Yii::t("menu","register_company")?></a></li>
                </ul>
            </div>
        </div>
        <!-- /.allproducts__grid -->
    </div>
    <!-- /.container allprooducts__container -->
</section>
