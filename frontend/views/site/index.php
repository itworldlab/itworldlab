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
                <!-- Slides -->
                <div class="swiper-slide">
                    <img src="images/dist/slide-1.jpg" class="swiper-slide__img" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="images/dist/slide-1.jpg" class="swiper-slide__img" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="images/dist/slide-1.jpg" class="swiper-slide__img" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="images/dist/slide-1.jpg" class="swiper-slide__img" alt="">
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
    <!-- /.slider-main -->
    <div class="slider-main-text">
        <div class="slider-main-text__wrapper">
            <div class="container slider-main-text__container">
                <div class="header__bottom">
                    <strong>Самый большой</strong> супермаркет IT решений в Казахстане
                </div>
            </div>

            <div class="swiper js-slider-main-text">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="container swiper-slide__container">
                            <div class="title-1">IT - Academy</div>
                            <div class="swiper-slide__subtitle">Разместите своё резюме</div>
                            <a href="" class="goldBtn swiper-slide__goldBtn">Подробнее</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="container swiper-slide__container">
                            <div class="title-1">Найдите специалиста</div>
                            <div class="swiper-slide__subtitle">Разместите своё резюме</div>
                            <a href="" class="goldBtn swiper-slide__goldBtn">Подробнее</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="container swiper-slide__container">
                            <div class="title-1">Лучшие IT - решения</div>
                            <div class="swiper-slide__subtitle">Разместите своё резюме</div>
                            <a href="" class="goldBtn swiper-slide__goldBtn">Подробнее</a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="container swiper-slide__container">
                            <div class="title-1">Зарабатывайте на том,<br>
                                что умеете</div>
                            <div class="swiper-slide__subtitle">Разместите своё резюме</div>
                            <a href="" class="goldBtn swiper-slide__goldBtn">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.slider-main-text__wrapper -->

    </div>
    <!-- /.slider-main-text -->
</div>

<section class="popular-section">
    <div class="container popular-section__container">
        <h2 class="h2">Популярные продукты в нашем сервисе</h2>
        <div class="popular-section__wrap">
            <div class="product-item">
                <div class="product-item__header">
                    <img src="images/dist/1C_Company_logo.jpg" class="product-item__logo" alt="">
                    <div class="product-item__header-col">
                        <h6 class="h6 product-item__title">Название продукта </h6>
                        <div class="info-row product-item__info-row">
                            <span class="info-row__item info-row__like">Средняя ценка: 9 341</span>
                            <span class="info-row__item info-row__comment">Отзывы: 123</span>
                        </div>
                    </div>
                </div>

                <p class="product-item__descript">
                    Крупнейший интранет: CRM и соцсеть компании одновременно. Универсальна: можно организовать службу поддержки, ...
                </p>
                <span class="compatibility__crm"><svg class="compatibility__svg"><use xlink:href="images/dist/sprite.svg#chart"></use></svg>SAP</span>
            </div>
            <!-- /.product-item -->
            <div class="product-item">
                <div class="product-item__header">
                    <img src="images/dist/1C_Company_logo.jpg" class="product-item__logo" alt="">
                    <div class="product-item__header-col">
                        <h6 class="h6 product-item__title">Название продукта </h6>
                        <div class="info-row product-item__info-row">
                            <span class="info-row__item info-row__like">Средняя ценка: 9 341</span>
                            <span class="info-row__item info-row__comment">Отзывы: 123</span>
                        </div>
                    </div>
                </div>

                <p class="product-item__descript">
                    Крупнейший интранет: CRM и соцсеть компании одновременно. Универсальна: можно организовать службу поддержки, ...
                </p>
                <span class="compatibility__crm"><svg class="compatibility__svg"><use xlink:href="images/dist/sprite.svg#chart"></use></svg>SAP</span>
            </div>
            <!-- /.product-item -->
            <div class="product-item">
                <div class="product-item__header">
                    <img src="images/dist/1C_Company_logo.jpg" class="product-item__logo" alt="">
                    <div class="product-item__header-col">
                        <h6 class="h6 product-item__title">Название продукта </h6>
                        <div class="info-row product-item__info-row">
                            <span class="info-row__item info-row__like">Средняя ценка: 9 341</span>
                            <span class="info-row__item info-row__comment">Отзывы: 123</span>
                        </div>
                    </div>
                </div>

                <p class="product-item__descript">
                    Крупнейший интранет: CRM и соцсеть компании одновременно. Универсальна: можно организовать службу поддержки, ...
                </p>
                <span class="compatibility__crm"><svg class="compatibility__svg"><use xlink:href="images/dist/sprite.svg#chart"></use></svg>SAP</span>
            </div>
            <!-- /.product-item -->
        </div>
        <!-- /.popular-section__wrap -->

    </div>
    <!-- /.container popular-section__container -->
</section>


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

<section class="integrator">
    <div class="container integrator__container">
        <h2 class="h2 integrator__title title-more">Лучшие интеграторы <a href="" class="title-more__link">Посмотреть всех <svg class="title-more__icon"><use xlink:href="images/dist/sprite.svg#caret-big-right"></use></svg></a></h2>

        <div class="integrator__wrap">
            <div class="integrator__item">
                <img src="images/dist/it-logo.png" class="integrator__logo" alt="">
                <div class="integrator__name">IT WORLD LAB</div>
                <ul class="info-row info-row--vertical integrator__info-row">
                    <li>
                        <span class="info-row__item info-row__like">Средняя ценка: 9 341</span>
                    </li>
                    <li>
                        <span class="info-row__item info-row__comment">Отзывы: 123</span>
                    </li>
                    <li class="partner-row__list-location info-row__item">Офис в: Алматы <svg class="partner-row__faq-icon"><use xlink:href="images/dist/sprite.svg#faq"></use></svg></li>
                </ul>
                <hr/>
                <div class="">
                    <div class="box__name">Интегрируемое ПО: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link">Ещё...</a>
                </div>
            </div>
            <div class="integrator__item">
                <img src="images/dist/it-logo.png" class="integrator__logo" alt="">
                <div class="integrator__name">IT WORLD LAB</div>
                <ul class="info-row info-row--vertical integrator__info-row">
                    <li>
                        <span class="info-row__item info-row__like">Средняя ценка: 9 341</span>
                    </li>
                    <li>
                        <span class="info-row__item info-row__comment">Отзывы: 123</span>
                    </li>
                    <li class="partner-row__list-location info-row__item">Офис в: Алматы <svg class="partner-row__faq-icon"><use xlink:href="images/dist/sprite.svg#faq"></use></svg></li>
                </ul>
                <div class="box">
                    <div class="box__name">Интегрируемое ПО: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link">Ещё...</a>
                </div>
            </div>
            <div class="integrator__item">
                <img src="images/dist/it-logo.png" class="integrator__logo" alt="">
                <div class="integrator__name">IT WORLD LAB</div>
                <ul class="info-row info-row--vertical integrator__info-row">
                    <li>
                        <span class="info-row__item info-row__like">Средняя ценка: 9 341</span>
                    </li>
                    <li>
                        <span class="info-row__item info-row__comment">Отзывы: 123</span>
                    </li>
                    <li class="partner-row__list-location info-row__item">Офис в: Алматы <svg class="partner-row__faq-icon"><use xlink:href="images/dist/sprite.svg#faq"></use></svg></li>
                </ul>
                <div class="box">
                    <div class="box__name">Интегрируемое ПО: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link">Ещё...</a>
                </div>
            </div>
            <div class="integrator__item">
                <img src="images/dist/it-logo.png" class="integrator__logo" alt="">
                <div class="integrator__name">IT WORLD LAB</div>
                <ul class="info-row info-row--vertical integrator__info-row">
                    <li>
                        <span class="info-row__item info-row__like">Средняя ценка: 9 341</span>
                    </li>
                    <li>
                        <span class="info-row__item info-row__comment">Отзывы: 123</span>
                    </li>
                    <li class="partner-row__list-location info-row__item">Офис в: Алматы <svg class="partner-row__faq-icon"><use xlink:href="images/dist/sprite.svg#faq"></use></svg></li>
                </ul>
                <div class="box">
                    <div class="box__name">Интегрируемое ПО: 6</div>
                    <ul class="list-po">
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>Битрикс24</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/sap-logo-small.svg" alt=""></span>1с - Бухгалтерия</li>
                        <li class="list-po__item"><span class="list-po__wrap"><img src="images/dist/bitriks-small.png" alt=""></span>SAP</li>
                    </ul>
                    <a href="" class="box__link">Ещё...</a>
                </div>
            </div>
        </div>
        <!-- /.integrator__wrap -->
    </div>
    <!-- /.container integrator__container -->
</section>

<section class="news">
    <div class="container news__container">
        <h2 class="h2 news__title title-more">Новости <a href="" class="title-more__link">Посмотреть всех <svg class="title-more__icon"><use xlink:href="images/dist/sprite.svg#caret-big-right"></use></svg></a></h2>
        <div class="news__grid">
            <div class="news__grid-item">
                <img src="images/dist/news-img-1.jpg" class="news__grid-img" alt="">
                <h6 class="h6 news__title">Название продукта </h6>
                <p class="news__descript">
                    Описание новости в несколько строк, но не превышая 100 символов, после чего ставиться многоточие ...
                </p>
                <div class="hashtags">
                    <a href="">#ключевые_слова</a>
                    <a href="">#ключевые_слова</a>
                    <a href="">#ключевые_слова</a>
                </div>
                <div class="news__data">
                    <span>80 просмотров</span>
                    <span>14.12.2021</span>
                </div>
            </div>
            <!-- /.news__grid-item -->
            <div class="news__grid-item">
                <img src="images/dist/news-img-2.jpg" class="news__grid-img" alt="">
                <h6 class="h6 news__title">Название продукта </h6>
                <p class="news__descript">
                    Описание новости в несколько строк, но не превышая 100 символов, после чего ставиться многоточие ...
                </p>
                <div class="hashtags">
                    <a href="">#ключевые_слова</a>
                    <a href="">#ключевые_слова</a>
                    <a href="">#ключевые_слова</a>
                </div>
                <div class="news__data">
                    <span>80 просмотров</span>
                    <span>14.12.2021</span>
                </div>
            </div>
            <!-- /.news__grid-item -->
            <div class="news__grid-item">
                <img src="images/dist/news-img-3.jpg" class="news__grid-img" alt="">
                <h6 class="h6 news__title">Название продукта </h6>
                <p class="news__descript">
                    Описание новости в несколько строк, но не превышая 100 символов, после чего ставиться многоточие ...
                </p>
                <div class="hashtags">
                    <a href="">#ключевые_слова</a>
                    <a href="">#ключевые_слова</a>
                    <a href="">#ключевые_слова</a>
                </div>
                <div class="news__data">
                    <span>80 просмотров</span>
                    <span>14.12.2021</span>
                </div>
            </div>
            <!-- /.news__grid-item -->
        </div>
        <!-- /.news__grid -->
    </div>
    <!-- /.container news__container -->
</section>

<section class="resume">
    <div class="container resume__container">
        <h2 class="h2 resume__title">Призыв к размещению резюме</h2>
        <p class="resume__descript">Описание призыва к действию с пояснением в несколько строк</p>
        <a href="" class="goldBtn resume__goldBtn">Регистрация</a>
    </div>
    <!-- /.container resume__container -->
</section>

<section class="container itworldlab">
    <h2 class="h2 itworldlab__title">IT WORLD LAB - цифровой супермаркет it решений</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>

    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)</p>
    <a href="" class="goldBtn itworldlab__goldBtn">Подробнее</a>
</section>

<section class="allproducts">
    <div class="container allprooducts__container">
        <h2 class="h2 allproducts__title">Все продукты и услуги маркетплейса</h2>
        <div class="allproducts__grid">
            <div class="allproducts__grid-col">
                <h5 class="h5 allproducts__grid-title">Продукты</h5>
                <ul class="listMenu">
                    <li><a href="">CRM</a></li>
                    <li><a href="">BPM</a></li>
                    <li><a href="">WMS</a></li>
                    <li><a href="">СЭД</a></li>
                    <li><a href="">ERP</a></li>
                    <li><a href="">IaaS</a></li>
                    <li><a href="">IT Безопасность</a></li>
                    <li><a href="">IP телефония</a></li>
                    <li><a href="">Офисные приложения</a></li>
                    <li><a href="">Онлайн бухгалтерия</a></li>
                </ul>
            </div>
            <div class="allproducts__grid-col">
                <h5 class="h5 allproducts__grid-title">Услуги</h5>
                <ul class="listMenu">
                    <li><a href="">Интеграция продуктов</a></li>
                    <li><a href="">Консалтинг</a></li>
                    <li><a href="">Разработка сайтов и приложений</a></li>
                    <li><a href="">Разработка ПО</a></li>
                    <li><a href="">Аутсорсинг</a></li>
                    <li><a href="">Техническая поддержка</a></li>
                </ul>
            </div>
            <div class="allproducts__grid-col">
                <h5 class="h5 allproducts__grid-title">Курсы</h5>
                <ul class="listMenu">
                    <li><a href="">Повышение квалификации</a></li>
                    <li><a href="">Обучение с 0</a></li>
                    <li><a href="">Обучение сотрудников</a></li>
                </ul>
            </div>
            <div class="allproducts__grid-col">
                <h5 class="h5 allproducts__grid-title">Ещё</h5>
                <ul class="listMenu">
                    <li><a href="">Регистрация продукта</a></li>
                    <li><a href="">Регистрация разработчика</a></li>
                    <li><a href="">Регистрация интегратора</a></li>
                </ul>
            </div>
        </div>
        <!-- /.allproducts__grid -->
    </div>
    <!-- /.container allprooducts__container -->
</section>
