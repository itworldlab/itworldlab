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
                    <div class="title-1">IT - Academy</div>
                    <div class="swiper-slide__subtitle">Разместите своё резюме</div>
                    <a href="" class="goldBtn swiper-slide__goldBtn">Подробнее</a>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="images/dist/slide-1.jpg" class="swiper-slide__img" alt="">
                <div class="container swiper-slide__container">
                    <div class="title-1">Найдите специалиста</div>
                    <div class="swiper-slide__subtitle">Разместите своё резюме</div>
                    <a href="" class="goldBtn swiper-slide__goldBtn">Подробнее</a>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="images/dist/slide-1.jpg" class="swiper-slide__img" alt="">
                <div class="container swiper-slide__container">
                    <div class="title-1">Лучшие IT - решения</div>
                    <div class="swiper-slide__subtitle">Разместите своё резюме</div>
                    <a href="" class="goldBtn swiper-slide__goldBtn">Подробнее</a>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="images/dist/slide-1.jpg" class="swiper-slide__img" alt="">
                <div class="container swiper-slide__container">
                    <div class="title-1">Зарабатывайте на том,<br>
                        что умеете</div>
                    <div class="swiper-slide__subtitle">Разместите своё резюме</div>
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
                <strong class="slider-btns__title">IT - Academy</strong>
                <span class="slider-btns__descript">
                            Отличный старт для успешной карьеры
                        </span>
                <span class="slider-btns__blue"></span>
            </li>
            <li class="slider-btns__item" data-slide="2">
                <strong class="slider-btns__title">Найдите специалиста</strong>
                <span class="slider-btns__descript">
                            Для внедрения или доработки
                        </span>
                <span class="slider-btns__blue"></span>
            </li>
            <li class="slider-btns__item" data-slide="3">
                <strong class="slider-btns__title">Лучшие IT - решения</strong>
                <span class="slider-btns__descript">
                            Для развития вашего бизнеса
                        </span>
                <span class="slider-btns__blue"></span>
            </li>
            <li class="slider-btns__item" data-slide="4">
                <strong class="slider-btns__title">Зарабатывайте на том, что умеете</strong>
                <span class="slider-btns__descript">
                            Разместите своё резюме
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
        <h3 class="h3 title-link"><span>Популярные продукты в нашем сервисе</span> <a href="" class="title-link__all"><span>Посмотреть всех</span> <svg class="title-link__all-icon"><use xlink:href="images/dist/sprite.svg#arrow-next"></use></svg></a></h3>
        <div class="popular-slider js-popular-slider">
            <div>
                <div class="box">
                    <div class="box__wrap">
                        <img class="box__logo" src="images/dist/logo-1c.svg" alt="">
                    </div>
                    <span class="box__logoDesc">1c Бухгалтерия</span>
                    <ul class="box__gray">
                        <li>Использований: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
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
                        <li>Использований: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
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
                        <li>Использований: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
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
                        <li>Использований: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
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
                        <li>Использований: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
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
                        <li>Использований: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
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
            <h4 class="h4 need__title">Мне нужен IT продукт, для того что бы:</h4>
            <div class="links">
                <a href="" class="links__item">Настроить воронку продаж</a>
                <a href="" class="links__item">Разместить данные в облачном хранилище</a>
                <a href="" class="links__item">Защитить свои данные</a>
                <a href="" class="links__item">Отследить качество работы сотрудников</a>
                <a href="" class="links__item">Автоматизировать бизнес процессы</a>
                <a href="" class="links__item">Автоматизировать отдел продаж</a>
                <a href="" class="links__item">Автоматизировать отдел продаж</a>
                <a href="" class="links__item">Настроить воронку продаж</a>
                <a href="" class="links__item">Автоматизировать бизнес процессы</a>
                <a href="" class="links__item">Отследить качество работы сотрудников</a>
                <a href="" class="links__item">Автоматизировать бизнес процессы</a>
                <a href="" class="links__item">Автоматизировать отдел продаж</a>
            </div>
            <!-- /.links -->
            <a href="" class="goldBtn need__goldBtn">Найти свой вариант</a>
        </div>
        <!-- /.container need__container -->
    </section>

<div class="container">
    <!-- /.need -->

    <div class="integrator">
        <h3 class="h3 integrator__title title-link"><span>Лучшие интеграторы</span> <a href="" class="title-link__all"><span>Посмотреть всех</span> <svg class="title-link__all-icon"><use xlink:href="images/dist/sprite.svg#arrow-next"></use></svg></a></h3>

        <div class="integrator-slider js-integrator-slider">
            <div>
                <div class="box">
                    <img class="box__logo" src="images/dist/it-logo.svg" alt="">
                    <span class="box__logoDesc">IT WORLD LAB</span>
                    <ul class="box__gray">
                        <li>Использований: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
                    </ul>

                    <div class="box__name">Интегрируемое ПО: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link">Ещё...</a>
                </div>
                <!-- END box -->
            </div>
            <div>
                <div class="box">
                    <img class="box__logo" src="images/dist/it-world-lab-small.png" alt="">
                    <span class="box__logoDesc">IWL</span>
                    <ul class="box__gray">
                        <li>Использований: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
                    </ul>

                    <div class="box__name">Интегрируемое ПО: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link">Ещё...</a>
                </div>
                <!-- END box -->
            </div>
            <div>
                <div class="box">
                    <img class="box__logo" src="images/dist/it-logo.svg" alt="">
                    <span class="box__logoDesc">IT WORLD LAB</span>
                    <ul class="box__gray">
                        <li>Использований: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
                    </ul>

                    <div class="box__name">Интегрируемое ПО: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link">Ещё...</a>
                </div>
                <!-- END box -->
            </div>
            <div>
                <div class="box">
                    <img class="box__logo" src="images/dist/it-world-lab-small.png" alt="">
                    <span class="box__logoDesc">IWL</span>
                    <ul class="box__gray">
                        <li>Использований: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
                    </ul>

                    <div class="box__name">Интегрируемое ПО: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link">Ещё...</a>
                </div>
                <!-- END box -->
            </div>
            <div>
                <div class="box">
                    <img class="box__logo" src="images/dist/it-logo.svg" alt="">
                    <span class="box__logoDesc">IT WORLD LAB</span>
                    <ul class="box__gray">
                        <li>Использований: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
                    </ul>

                    <div class="box__name">Интегрируемое ПО: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link">Ещё...</a>
                </div>
                <!-- END box -->
            </div>
            <div>
                <div class="box">
                    <img class="box__logo" src="images/dist/it-world-lab-small.png" alt="">
                    <span class="box__logoDesc">IWL</span>
                    <ul class="box__gray">
                        <li>Использований: 1231</li>
                        <li><svg class="like-icon"><use xlink:href="images/dist/sprite.svg#like"></use></svg>Средняя ценка: 94 133</li>
                        <li><svg class="reviews-icon"><use xlink:href="images/dist/sprite.svg#reviews"></use></svg>Отзывы: 3 123</li>
                    </ul>

                    <div class="box__name">Интегрируемое ПО: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link">Ещё...</a>
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
