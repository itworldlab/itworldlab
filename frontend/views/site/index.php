<?php

/* @var $this yii\web\View */

use kartik\select2\Select2;
use evgeniyrru\yii2slick\Slick;
use yii\web\JsExpression;
use yii\bootstrap4\Html;

?>
<div class="slider-main">
    <!-- Slider main container -->
    <div class="swiper js-swiper">
        <!--                <img src="images/dist/blue-bg.png" class="slider-main__bg" alt="">-->
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="images/dist/slide-1.jpg" class="swiper-slide__img" alt="">
                <div class="container swiper-slide__container">
                    <div class="title-1"><?=Yii::t("index","slide1_text")?></div>
                    <div class="swiper-slide__subtitle"><?=Yii::t("index","slide1_subtext")?></div>
                    <a href="" class="goldBtn swiper-slide__goldBtn"><?=Yii::t("index","more")?></a>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="images/dist/slide-1.jpg" class="swiper-slide__img" alt="">
                <div class="container swiper-slide__container">
                    <div class="title-1"><?=Yii::t("index","slide2_text")?></div>
                    <div class="swiper-slide__subtitle"><?=Yii::t("index","slide2_subtext")?></div>
                    <a href="" class="goldBtn swiper-slide__goldBtn"><?=Yii::t("index","more")?></a>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="images/dist/slide-1.jpg" class="swiper-slide__img" alt="">
                <div class="container swiper-slide__container">
                    <div class="title-1"><?=Yii::t("index","slide3_text")?></div>
                    <div class="swiper-slide__subtitle"><?=Yii::t("index","slide3_subtext")?></div>
                    <a href="" class="goldBtn swiper-slide__goldBtn"><?=Yii::t("index","more")?></a>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="images/dist/slide-1.jpg" class="swiper-slide__img" alt="">
                <div class="container swiper-slide__container">
                    <div class="title-1"><?=Yii::t("index","slide4_text")?></div>
                    <div class="swiper-slide__subtitle"><?=Yii::t("index","slide3_subtext")?></div>
                    <a href="" class="goldBtn swiper-slide__goldBtn">Подробнее</a>
                </div>
            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <div class="container slider-main__container">
        <ul class="slider-btns">
            <li class="slider-btns__item" data-slide="1">
                <strong class="slider-btns__title"><?=Yii::t("index","slide1_text")?></strong>
                <span class="slider-btns__descript">
                            <?=Yii::t("index","slide1_subtext")?>
                        </span>
                <span class="slider-btns__blue"></span>
            </li>
            <li class="slider-btns__item" data-slide="2">
                <strong class="slider-btns__title"><?=Yii::t("index","slide2_text")?></strong>
                <span class="slider-btns__descript">
                           <?=Yii::t("index","slide2_subtext")?>
                        </span>
                <span class="slider-btns__blue"></span>
            </li>
            <li class="slider-btns__item" data-slide="3">
                <strong class="slider-btns__title"><?=Yii::t("index","slide3_text")?></strong>
                <span class="slider-btns__descript">
                            <?=Yii::t("index","slide3_subtext")?>
                        </span>
                <span class="slider-btns__blue"></span>
            </li>
            <li class="slider-btns__item" data-slide="4">
                <strong class="slider-btns__title"><?=Yii::t("index","slide4_text")?></strong>
                <span class="slider-btns__descript">
                           <?=Yii::t("index","slide4_subtext")?>
                        </span>
                <span class="slider-btns__blue"></span>
            </li>
        </ul>
    </div>
    <!-- /.container slider-main__container -->
</div>
<div class="container main-container">

    <!-- /.slider-text container -->

    <div class="popular">
        <h3 class="h3 title-link"><span><?=Yii::t("index","popular")?></span> <a href="" class="title-link__all"><span><?=Yii::t("index","see_all")?></span> <svg class="title-link__all-icon"><use xlink:href="images/dist/sprite.svg#arrow-next"></use></svg></a></h3>
        <div class="popular-slider js-popular-slider">
            <div>
                <div class="box">
                    <div class="box__wrap">
                        <img class="box__logo" src="images/dist/logo-1c.svg" alt="">
                    </div>
                    <span class="box__logoDesc">1c Бухгалтерия</span>
                    <ul class="box__gray">
                        <li><?=Yii::t("product","uses")?>: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg><?=Yii::t("product","average_rate")?>: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg><?=Yii::t("product","reviews")?>: 3 123</li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="box">
                    <div class="box__wrap">
                        <img class="box__logo" src="images/dist/bitriks-logo.svg" alt="">
                    </div>
                    <span class="box__logoDesc">Битрикс 24</span>
                    <ul class="box__gray">
                        <li><?=Yii::t("product","uses")?>: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg><?=Yii::t("product","average_rate")?>: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg><?=Yii::t("product","reviews")?>: 3 123</li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="box">
                    <div class="box__wrap">
                        <img class="box__logo" src="images/dist/logo-1c.svg" alt="">
                    </div>
                    <span class="box__logoDesc">1c Бухгалтерия</span>
                    <ul class="box__gray">
                        <li><?=Yii::t("product","uses")?>: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg><?=Yii::t("product","average_rate")?>: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg><?=Yii::t("product","reviews")?>: 3 123</li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="box">
                    <div class="box__wrap">
                        <img class="box__logo" src="images/dist/bitriks-logo.svg" alt="">
                    </div>
                    <span class="box__logoDesc">Битрикс 24</span>
                    <ul class="box__gray">
                        <li><?=Yii::t("product","uses")?>: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg><?=Yii::t("product","average_rate")?>: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg><?=Yii::t("product","reviews")?>: 3 123</li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="box">
                    <div class="box__wrap">
                        <img class="box__logo" src="images/dist/logo-1c.svg" alt="">
                    </div>
                    <span class="box__logoDesc">1c Бухгалтерия</span>
                    <ul class="box__gray">
                        <li><?=Yii::t("product","uses")?>: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg><?=Yii::t("product","average_rate")?>: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg><?=Yii::t("product","reviews")?>: 3 123</li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="box">
                    <div class="box__wrap">
                        <img class="box__logo" src="images/dist/bitriks-logo.svg" alt="">
                    </div>
                    <span class="box__logoDesc">Битрикс 24</span>
                    <ul class="box__gray">
                        <li><?=Yii::t("product","uses")?>: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg><?=Yii::t("product","average_rate")?>: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg><?=Yii::t("product","reviews")?>: 3 123</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END popular-slider -->
    </div>

</div>
    <!-- /.popular -->

    <section class="need">
        <div class="container need__container">
            <h4 class="h4 need__title"><?=Yii::t("index","need_text")?></h4>
            <div class="links">
                <a href="" class="links__item"><?=Yii::t("index","need1")?></a>
                <a href="" class="links__item"><?=Yii::t("index","need2")?></a>
                <a href="" class="links__item"><?=Yii::t("index","need3")?></a>
                <a href="" class="links__item"><?=Yii::t("index","need4")?></a>
                <a href="" class="links__item"><?=Yii::t("index","need5")?></a>
                <a href="" class="links__item"><?=Yii::t("index","need6")?></a>
                <a href="" class="links__item"><?=Yii::t("index","need7")?></a>
            </div>
            <!-- /.links -->
            <a href="" class="goldBtn need__goldBtn"><?=Yii::t("index","need_btn")?></a>
        </div>
        <!-- /.container need__container -->
    </section>

<div class="container">
    <!-- /.need -->

    <div class="integrator">
        <h3 class="h3 integrator__title title-link"><span><?=Yii::t("index","best_integrators")?></span> <a href="" class="title-link__all"><span><?=Yii::t("index","see_all")?></span> <svg class="title-link__all-icon"><use xlink:href="images/dist/sprite.svg#arrow-next"></use></svg></a></h3>

        <div class="integrator-slider js-integrator-slider">
            <div>
                <div class="box">
                    <img class="box__logo" src="images/dist/it-logo.svg" alt="">
                    <span class="box__logoDesc">IT WORLD LAB</span>
                    <ul class="box__gray">
                        <li><?=Yii::t("product","uses")?>: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg><?=Yii::t("product","average_rate")?>: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg><?=Yii::t("product","reviews")?>: 3 123</li>
                    </ul>

                    <div class="box__name"><?=Yii::t("product","integrate_soft")?>: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link"><?=Yii::t("index","more")?>...</a>
                </div>
                <!-- END box -->
            </div>
            <div>
                <div class="box">
                    <img class="box__logo" src="images/dist/it-world-lab-small.png" alt="">
                    <span class="box__logoDesc">IWL</span>
                    <ul class="box__gray">
                        <li><?=Yii::t("product","uses")?>: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg><?=Yii::t("product","average_rate")?>: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg><?=Yii::t("product","reviews")?>: 3 123</li>
                    </ul>

                    <div class="box__name"><?=Yii::t("product","integrate_soft")?>: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link"><?=Yii::t("index","more")?>...</a>
                </div>
                <!-- END box -->
            </div>
            <div>
                <div class="box">
                    <img class="box__logo" src="images/dist/it-logo.svg" alt="">
                    <span class="box__logoDesc">IT WORLD LAB</span>
                    <ul class="box__gray">
                        <li><?=Yii::t("product","uses")?>: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg><?=Yii::t("product","average_rate")?>: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg><?=Yii::t("product","reviews")?>: 3 123</li>
                    </ul>

                    <div class="box__name"><?=Yii::t("product","integrate_soft")?>: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link"><?=Yii::t("index","more")?>...</a>
                </div>
                <!-- END box -->
            </div>
            <div>
                <div class="box">
                    <img class="box__logo" src="images/dist/it-world-lab-small.png" alt="">
                    <span class="box__logoDesc">IWL</span>
                    <ul class="box__gray">
                        <li><?=Yii::t("product","uses")?>: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg><?=Yii::t("product","average_rate")?>: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg><?=Yii::t("product","reviews")?>: 3 123</li>
                    </ul>

                    <div class="box__name"><?=Yii::t("product","integrate_soft")?>: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link"><?=Yii::t("index","more")?>...</a>
                </div>
                <!-- END box -->
            </div>
            <div>
                <div class="box">
                    <img class="box__logo" src="images/dist/it-logo.svg" alt="">
                    <span class="box__logoDesc">IT WORLD LAB</span>
                    <ul class="box__gray">
                        <li><?=Yii::t("product","uses")?>: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg><?=Yii::t("product","average_rate")?>: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg><?=Yii::t("product","reviews")?>: 3 123</li>
                    </ul>

                    <div class="box__name"><?=Yii::t("product","integrate_soft")?>: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link"><?=Yii::t("index","more")?>...</a>
                </div>
                <!-- END box -->
            </div>
            <div>
                <div class="box">
                    <img class="box__logo" src="images/dist/it-world-lab-small.png" alt="">
                    <span class="box__logoDesc">IWL</span>
                    <ul class="box__gray">
                        <li><?=Yii::t("product","uses")?>: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg><?=Yii::t("product","average_rate")?>: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg><?=Yii::t("product","reviews")?>: 3 123</li>
                    </ul>

                    <div class="box__name"><?=Yii::t("product","integrate_soft")?>: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link"><?=Yii::t("index","more")?>...</a>
                </div>
                <!-- END box -->
            </div>
        </div>
        <!-- /.integrator-slider -->
    </div>
    <!-- /.integrator -->

    <div class="news">
        <h3 class="h3 news__title">Новости</h3>
        <div class="news__grid">
            <div class="news__grid-item">
                <div class="news__grid-img"></div>
                <h3 class="h3 news__grid-title">Название новости</h3>
                <p class="news__grid-text">Описание новости в несколько строк но не привышая 80 символов</p>
                <a href="" class="news__grid-tag">#ключевые_слова</a>
                <div class="news__grid-footer">
                    <span>80 просмотров</span><span>14.12.2021</span>
                </div>
            </div>
            <div class="news__grid-item">
                <div class="news__grid-img"></div>
                <h3 class="h3 news__grid-title">Название новости</h3>
                <p class="news__grid-text">Описание новости в несколько строк но не привышая 80 символов</p>
                <a href="" class="news__grid-tag">#ключевые_слова</a>
                <div class="news__grid-footer">
                    <span>80 просмотров</span><span>14.12.2021</span>
                </div>
            </div>
            <div class="news__grid-item">
                <div class="news__grid-img"></div>
                <h3 class="h3 news__grid-title">Название новости</h3>
                <p class="news__grid-text">Описание новости в несколько строк но не привышая 80 символов</p>
                <a href="" class="news__grid-tag">#ключевые_слова</a>
                <div class="news__grid-footer">
                    <span>80 просмотров</span><span>14.12.2021</span>
                </div>
            </div>
        </div>
        <!-- /.news__grid -->
    </div>
    <!-- /.news -->
</div>
<div class="resume">
    <div class="container resume__container">
        <img src="images/dist/man.png" class="resume__man" alt="">
        <div class="resume__text">
            <h2 class="h2">Призык к размещению резюме</h2>
            <p class="resume__subtitle">Описание призыва к действию с пояснением в несколько строк</p>
            <a href="#" class="btn btn-black resume__btn" tabindex="0">Регистрация</a>
        </div>
    </div>
    <!-- /.container resume__container -->
</div>
