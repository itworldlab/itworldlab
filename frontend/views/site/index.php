<?php

/* @var $this yii\web\View */

use kartik\select2\Select2;
use evgeniyrru\yii2slick\Slick;
use yii\web\JsExpression;
use yii\bootstrap4\Html;

$this->title = 'My Yii Application';
?>
<div class="container main-container">
    <h1 class="h1">Самый большой супермаркет IT решений в Казахстане</h1>

    <div class="slider-text">
        <div class="slider-text__list" id="js-slider-text-dots">
            <div class="slider-text__list-item" data-slide="0">
                <strong class="slider-text__list-title">Лучшие IT - решения</strong>
                <span class="slider-text__list-descript">Для развития вашего бизнеса</span>
            </div>
            <div class="slider-text__list-item" data-slide="1">
                <strong class="slider-text__list-title">Найдите специалиста</strong>
                <span class="slider-text__list-descript">Для внедрения или доработки</span>
            </div>
            <div class="slider-text__list-item" data-slide="2">
                <strong class="slider-text__list-title">IT - Academy</strong>
                <span class="slider-text__list-descript">Отличный старт для успешной карьеры</span>
            </div>
            <div class="slider-text__list-item" data-slide="3">
                <strong class="slider-text__list-title">Зарабатывайте на том, что умеете</strong>
                <span class="slider-text__list-descript">Разместите своё резюме</span>
            </div>
        </div>
        <!-- /.slider-text__list -->
        <div class="slider-text__slider">
            <button class="slick-arrow slick-prev" id="slider-text__prev" type="button"><svg class="slick-prev__icon"><use xlink:href="images/dist/sprite.svg#arrow-prev"></use></svg></button>
            <button class="slick-arrow slick-next" id="slider-text__next" type="button"><svg class="slick-next__icon"><use xlink:href="images/dist/sprite.svg#arrow-next"></use></svg></button>
            <div class="js-slider-text slider-text__slider-wrap">
                <div>
                    <div class="slider-text__slider-content">
                        <div class="slider-text__slider-text">
                                <span class="slider-text__slider-title">
                                    Лучшие IT - решения
                                </span>
                            <a href="#" class="btn btn-black">Подробнее</a>
                        </div>

                        <img src="images/dist/macbook.png" class="slider-text__slider-macbook" alt="">
                    </div>
                    <!-- /.slider-text__slider-content -->
                </div>
                <div>
                    <div class="slider-text__slider-content">
                        <div class="slider-text__slider-text">
                                <span class="slider-text__slider-title">
                                    Найдите специалиста
                                </span>
                            <a href="#" class="btn btn-black">Подробнее</a>
                        </div>

                        <img src="images/dist/macbook.png" class="slider-text__slider-macbook" alt="">
                    </div>
                    <!-- /.slider-text__slider-content -->
                </div>
                <div>
                    <div class="slider-text__slider-content">
                        <div class="slider-text__slider-text">
                                <span class="slider-text__slider-title">
                                    IT - Academy
                                </span>
                            <a href="#" class="btn btn-black">Подробнее</a>
                        </div>

                        <img src="images/dist/macbook.png" class="slider-text__slider-macbook" alt="">
                    </div>
                    <!-- /.slider-text__slider-content -->
                </div>
                <div>
                    <div class="slider-text__slider-content">
                        <div class="slider-text__slider-text">
                                <span class="slider-text__slider-title">
                                    Зарабатывайте на том, что умеете
                                </span>
                            <a href="#" class="btn btn-black">Подробнее</a>
                        </div>

                        <img src="images/dist/macbook.png" class="slider-text__slider-macbook" alt="">
                    </div>
                    <!-- /.slider-text__slider-content -->
                </div>
            </div>
            <!-- /.js-slider-text -->
        </div>
        <!-- /.slider-text__slider -->
    </div>
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
    <!-- /.popular -->

    <div class="need">
        <h3 class="h3 need__title">Мне нужен IT продукт, для того что бы:</h3>
        <div class="links">
            <a href="" class="links__item">Автоматизировать отдел продаж</a>
            <a href="" class="links__item">Настроить колл - центр</a>
            <a href="" class="links__item">Защитить свои данные</a>
            <a href="" class="links__item">Разместить данные в облачном хранилище</a>
            <a href="" class="links__item">Настроить воронку продаж</a>
            <a href="" class="links__item">Автоматизировать бизнес процессы</a>
            <a href="" class="links__item">Отследить качество работы сотрудников</a>
            <a href="" class="links__item">Автоматизировать отдел продаж</a>
            <a href="" class="links__item">Настроить колл - центр</a>
        </div>
        <button type="button" class="btn btn-black">Найти свой вариант</button>
    </div>
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
