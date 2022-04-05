<?php

use yii\helpers\Url;

?>
<div class="container">

    <div class="section-slider">
        <div class="slider-main slider-main--images">
            <!--            <div class="main-img"></div>-->
            <!-- Slider main container -->
            <div class="swiper js-swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <img src="/images/dist/slide-2.jpg" class="swiper-slide__img" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/images/dist/slide-2.jpg" class="swiper-slide__img" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/images/dist/slide-2.jpg" class="swiper-slide__img" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/images/dist/slide-2.jpg" class="swiper-slide__img" alt="">
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
            <div class="container slider-main__container">
                <ul class="slider-btns slider-btns--padding">
                    <li class="slider-btns__item" data-slide="1">
                        <strong class="slider-btns__title"><?=Yii::t("learning","learn_btn1")?></strong>
                        <span class="slider-btns__descript">
                                <?=Yii::t("learning","learn_btn1_descr")?>
                            </span>
                        <span class="slider-btns__blue"></span>
                    </li>
                    <li class="slider-btns__item" data-slide="2">
                        <strong class="slider-btns__title"><?=Yii::t("learning","learn_btn2")?></strong>
                        <span class="slider-btns__descript">
                                <?=Yii::t("learning","learn_btn2_descr")?>
                            </span>
                        <span class="slider-btns__blue"></span>
                    </li>
                    <li class="slider-btns__item" data-slide="3">
                        <strong class="slider-btns__title"><?=Yii::t("learning","learn_btn3")?></strong>
                        <span class="slider-btns__descript">
                                <?=Yii::t("learning","learn_btn3_descr")?>
                            </span>
                        <span class="slider-btns__blue"></span>
                    </li>
                    <li class="slider-btns__item" data-slide="4">
                        <strong class="slider-btns__title"><?=Yii::t("learning","learn_btn4")?></strong>
                        <span class="slider-btns__descript">
                                <?=Yii::t("learning","learn_btn4_descr")?>
                            </span>
                        <span class="slider-btns__blue"></span>
                    </li>
                </ul>
            </div>
            <!-- /.container slider-main__container -->
        </div>
        <!-- /.slider-main -->
        <div class="slider-main-text slider-main--textLeft">
            <div class="slider-main-text__wrapper">
                <div class="swiper js-slider-main-text">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="container swiper-slide__container">
                                <div class="title-1"><?=Yii::t("learning","change_prof")?><br>
                                    <?=Yii::t("learning","change_prof_and_profit")?></div>
                                <div class="swiper-slide__subtitle"><?=Yii::t("learning","descr")?></div>
                                <a href="<?=Url::to(['/education/catalog']);?>" class="goldBtn swiper-slide__goldBtn"><?=Yii::t("index","more")?></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="container swiper-slide__container">
                                <div class="title-1"><?=Yii::t("learning","find_empl")?></div>
                                <div class="swiper-slide__subtitle"><?=Yii::t("learning","find_empl_descr")?></div>
                                <a href="<?=Url::to(['/education/catalog']);?>" class="goldBtn swiper-slide__goldBtn"><?=Yii::t("index","more")?></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="container swiper-slide__container">
                                <div class="title-1"><?=Yii::t("learning","learn_btn3")?></div>
                                <div class="swiper-slide__subtitle"><?=Yii::t("learning","learn_btn2_descr")?></div>
                                <a href="<?=Url::to(['/education/catalog']);?>" class="goldBtn swiper-slide__goldBtn"><?=Yii::t("index","more")?></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="container swiper-slide__container">
                                <div class="title-1"><?=Yii::t("learning","learn_btn4")?></div>
                                <div class="swiper-slide__subtitle"><?=Yii::t("learning","find_empl_descr")?></div>
                                <a href="<?=Url::to(['/education/catalog']);?>" class="goldBtn swiper-slide__goldBtn"><?=Yii::t("index","more")?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.slider-main-text__wrapper -->

        </div>
        <!-- /.slider-main-text -->
    </div>
    <!-- /.section-slider -->

    <div class="qualifications">
        <h2 class="h2 qualifications__title"><?=Yii::t("learning","spec")?>:</h2>
        <div class="subtitle"><?=Yii::t("learning","by_data")?> hh.kz</div>
        <div class="specialty">
            <div class="specialty__item">
                <div class="specialty__header">
                    <img src="/images/dist/1C_Company_logo.jpg" alt="" class="specialty__logo">
                    <h6 class="h6 specialty__title"><?=Yii::t("learning","name1")?></h6>
                </div>
                <div class="specialty__descript">
                    <?=Yii::t("learning","descr1")?>

                </div>
                <div class="specialty__salary"><?=Yii::t("learning","zp")?>: <?=Yii::t("product","by")?> 1600 $</div>
                <a href="<?=Url::to(['/education/catalog']);?>" class="blueBtn specialty__blueBtn"><?=Yii::t("index","more")?></a>
            </div>
            <div class="specialty__item">
                <div class="specialty__header">
                    <img src="/images/dist/amoCrm.png" alt="" class="specialty__logo">
                    <h6 class="h6 specialty__title"><?=Yii::t("learning","name2")?></h6>
                </div>
                <div class="specialty__descript">
                    <?=Yii::t("learning","descr2")?>

                </div>
                <div class="specialty__salary"><?=Yii::t("learning","zp")?>: <?=Yii::t("product","by")?> 1600 $</div>
                <a href="<?=Url::to(['/education/catalog']);?>" class="blueBtn specialty__blueBtn"><?=Yii::t("index","more")?></a>
            </div>
            <div class="specialty__item">
                <div class="specialty__header">
                    <img src="/images/dist/1C_Company_logo.jpg" alt="" class="specialty__logo">
                    <h6 class="h6 specialty__title"><?=Yii::t("learning","name3")?></h6>
                </div>
                <div class="specialty__descript">
                    <?=Yii::t("learning","descr3")?>

                </div>
                <div class="specialty__salary"><?=Yii::t("learning","zp")?>: <?=Yii::t("product","by")?> 1600 $</div>
                <a href="<?=Url::to(['/education/catalog']);?>" class="blueBtn specialty__blueBtn"><?=Yii::t("index","more")?></a>
            </div>
        </div>
        <!-- /.specialty -->
    </div>
    <!-- /.qualifications -->

    <div class="courses">
        <h2 class="h2 courses__title"><?=Yii::t("learning","popular_cources")?>:</h2>
        <div class="subtitle"><?=Yii::t("learning","popular_cources_descr")?></div>
        <div class="courses-list">
            <div class="courses-list__item">
                <div class="courses-list__logo">
                    <img src="/images/dist/1C_Company_logo_small.svg" class="courses-list__img" alt="">
                </div>
                <p class="courses-list__descript">
                    <?=Yii::t("learning","popular_cources_descr")?>
                </p>
                <a href="<?=Url::to(['/education/catalog']);?>" class="blueBtn courses-list__blueBtn"><?=Yii::t("learning","view_cource")?></a>
            </div>
            <div class="courses-list__item">
                <div class="courses-list__logo">
                    <img src="/images/dist/bitrix24.png" class="courses-list__img" alt="">
                </div>
                <p class="courses-list__descript">
                    <?=Yii::t("learning","popular_cources_descr")?>
                </p>
                <a href="<?=Url::to(['/education/catalog']);?>" class="blueBtn courses-list__blueBtn"><?=Yii::t("learning","view_cource")?></a>
            </div>
            <div class="courses-list__item">
                <div class="courses-list__logo">
                    <img src="/images/dist/amoCrm.png" class="courses-list__img" alt="">
                </div>
                <p class="courses-list__descript">
                    <?=Yii::t("learning","popular_cources_descr")?>
                </p>
                <a href="<?=Url::to(['/education/catalog']);?>" class="blueBtn courses-list__blueBtn"><?=Yii::t("learning","view_cource")?></a>
            </div>
            <div class="courses-list__item">
                <div class="courses-list__logo">
                    <img src="/images/dist/SAP.png" class="courses-list__img" alt="">
                </div>
                <p class="courses-list__descript">
                    <?=Yii::t("learning","popular_cources_descr")?>
                </p>
                <a href="<?=Url::to(['/education/catalog']);?>" class="blueBtn courses-list__blueBtn"><?=Yii::t("learning","view_cource")?></a>
            </div>
        </div>
        <!-- /.courses-list -->
    </div>
    <!-- /.courses -->
</div>
<!-- /.container -->

<section class="section-text">
    <div class="container section-text__container">
        <h2 class="section-text__title"><?=Yii::t("learning","get_help")?></h2>
        <div class="section-text__descript"><?=Yii::t("learning","get_help_descr")?></div>
        <a href="<?=Url::to(['/education/catalog']);?>" class="goldBtn section-text__goldBtn"><?=Yii::t("app","register")?></a>
    </div>
    <!-- /.container section-text__container -->
</section>
