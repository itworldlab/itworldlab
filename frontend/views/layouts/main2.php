<?php

?>
<?php use yii\helpers\Html;

$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="/css/main.min.css"/>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrapper">
    <header class="header">
        <div class="container header__container">
            <a href="/" class="logo header__logo"><img src="images/dist/logo.svg" alt=""></a>
            <ul class="menu">
                <li class="menu__item">
                    <a href="" class="menu__link">Продукты <svg class="menu__arrow"><use xlink:href="images/dist/sprite.svg#arrow-bottom"></use></svg></a>
                    <div class="box-list menu__box-list">
                        <ul class="box-list__top">
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/iaas.svg" alt=""></span>
                                    <span class="box-list__top-text">IaaS</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/it.svg" alt=""></span>
                                    <span class="box-list__top-text">IT Безопасность</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/crm.svg" alt=""></span>
                                    <span class="box-list__top-text">CRM</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/bpm.svg" alt=""></span>
                                    <span class="box-list__top-text">BPM</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/rpa.svg" alt=""></span>
                                    <span class="box-list__top-text">RPA</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/phone.svg" alt=""></span>
                                    <span class="box-list__top-text">IP<br>              телефония</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/sed.svg" alt=""></span>
                                    <span class="box-list__top-text">СЭД</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/erp.svg" alt=""></span>
                                    <span class="box-list__top-text">ERP</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/office.svg" alt=""></span>
                                    <span class="box-list__top-text">Офисные приложения</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/online-b.svg" alt=""></span>
                                    <span class="box-list__top-text">Онлайн бухгалтерия</span>
                                </a></li>
                        </ul>
                        <div class="box-list__descript">Здесь будет текст с описанием категории которую вы выбрали...</div>
                    </div>
                </li>
                <li class="menu__item">
                    <a href="" class="menu__link">Услуги <svg class="menu__arrow"><use xlink:href="images/dist/sprite.svg#arrow-bottom"></use></svg></a>
                    <div class="box-list menu__box-list menu__box-list--posa1">
                        <ul class="box-list__top">
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/iaas.svg" alt=""></span>
                                    <span class="box-list__top-text">IaaS</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/it.svg" alt=""></span>
                                    <span class="box-list__top-text">IT Безопасность</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/crm.svg" alt=""></span>
                                    <span class="box-list__top-text">CRM</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/bpm.svg" alt=""></span>
                                    <span class="box-list__top-text">BPM</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/rpa.svg" alt=""></span>
                                    <span class="box-list__top-text">RPA</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/phone.svg" alt=""></span>
                                    <span class="box-list__top-text">IP<br>              телефония</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/sed.svg" alt=""></span>
                                    <span class="box-list__top-text">СЭД</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/erp.svg" alt=""></span>
                                    <span class="box-list__top-text">ERP</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/office.svg" alt=""></span>
                                    <span class="box-list__top-text">Офисные приложения</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="images/dist/online-b.svg" alt=""></span>
                                    <span class="box-list__top-text">Онлайн бухгалтерия</span>
                                </a></li>
                        </ul>
                        <div class="box-list__descript">Здесь будет текст с описанием категории которую вы выбрали...</div>
                    </div>
                </li>
                <li class="menu__item"><a href="" class="menu__link">Интеграторы</a></li>
                <li class="menu__item"><a href="" class="menu__link">Обучение</a></li>
                <li class="menu__item"><a href="" class="menu__link">Новости</a></li>
            </ul>
            <div class="header__right">
                <a class="location header__location" href=""><svg class="location__icon"><use xlink:href="images/dist/sprite.svg#location"></use></svg></a>
                <a href="" class="search-link header__search-link"><svg class="search-link__icon"><use xlink:href="images/dist/sprite.svg#loupe"></use></svg></a>
                <ul class="lang header__lang">
                    <li class="lang__choose">
                        <a class="lang__choose-link" href="">RU <svg class="lang__choose-icon"><use xlink:href="images/dist/sprite.svg#arrow-bottom"></use></svg></a>
                        <ul class="lang__dropdown">
                            <li class="lang__dropdown-item"><a href="" class="lang__dropdown-link">KZ</a></li>
                            <li class="lang__dropdown-item"><a href="" class="lang__dropdown-link">ENG</a></li>
                            <li class="lang__dropdown-item"><a href="" class="lang__dropdown-link">CH</a></li>
                        </ul>
                    </li>
                </ul>
                <a href="" class="blueBtn">Регистрация / вход</a>
            </div>
            <!-- /.header__right -->
            <a href="" class="header__mobile js-menuBtn"></a>
        </div>
        <!-- /.container header__container -->
        <div class="container header__bottom">
            <strong>Самый большой</strong> супермаркет IT решений в Казахстане
        </div>
    </header>
    <ul class="mobileMenu" id="mobileMenu">
        <li class="mobileMenu__item mobileMenu__item-flex">
            <a href="" class="mobileMenu__link">
                Регистрация / вход <svg class="reg mobileMenu__reg"><use xlink:href="images/dist/sprite.svg#user"></use></svg>
            </a>
        </li>
        <li class="mobileMenu__item">
            <div class="mobileMenu__lang js-title">
                RU
            </div>
            <ul class="mobileMenu__langList js-hidden">
                <li><a href="">KZ</a></li>
                <li><a href="">ENG</a></li>
                <li><a href="">CH</a></li>
            </ul>
        </li>
        <li class="mobileMenu__item">
            <div class="mobileMenu__menu js-title">Продукты</div>
            <div class="mobileMenu__slideUp js-hidden">
                <ul class="verticalMenu">
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="images/dist/iaas.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IT Безопасность <span class="verticalMenu__link-wrap"><img src="images/dist/it.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="images/dist/crm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="images/dist/bpm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="images/dist/rpa.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IP - телефония <span class="verticalMenu__link-wrap"><img src="images/dist/phone.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">СЭД <span class="verticalMenu__link-wrap"><img src="images/dist/sed.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="images/dist/erp.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">Офисные приложения <span class="verticalMenu__link-wrap"><img src="images/dist/office.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">Онлайн бухгалтерия <span class="verticalMenu__link-wrap"><img src="images/dist/online-b.svg" alt=""></span></a></li>
                </ul>
            </div>
        </li>
        <li class="mobileMenu__item">
            <div class="mobileMenu__menu js-title">Услуги</div>
            <div class="mobileMenu__slideUp js-hidden">
                <ul class="verticalMenu">
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="images/dist/iaas.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IT Безопасность <span class="verticalMenu__link-wrap"><img src="images/dist/it.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="images/dist/crm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="images/dist/bpm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="images/dist/rpa.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IP - телефония <span class="verticalMenu__link-wrap"><img src="images/dist/phone.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">СЭД <span class="verticalMenu__link-wrap"><img src="images/dist/sed.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="images/dist/erp.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">Офисные приложения <span class="verticalMenu__link-wrap"><img src="images/dist/office.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">Онлайн бухгалтерия <span class="verticalMenu__link-wrap"><img src="images/dist/online-b.svg" alt=""></span></a></li>
                </ul>
            </div>
        </li>
        <li class="mobileMenu__item">
            <div class="mobileMenu__menu js-title">Интеграторы</div>
            <div class="mobileMenu__slideUp js-hidden">
                <ul class="verticalMenu">
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="images/dist/iaas.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IT Безопасность <span class="verticalMenu__link-wrap"><img src="images/dist/it.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="images/dist/crm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="images/dist/bpm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="images/dist/rpa.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IP - телефония <span class="verticalMenu__link-wrap"><img src="images/dist/phone.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">СЭД <span class="verticalMenu__link-wrap"><img src="images/dist/sed.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="images/dist/erp.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">Офисные приложения <span class="verticalMenu__link-wrap"><img src="images/dist/office.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">Онлайн бухгалтерия <span class="verticalMenu__link-wrap"><img src="images/dist/online-b.svg" alt=""></span></a></li>
                </ul>
            </div>
        </li>
        <li class="mobileMenu__item">
            <div class="mobileMenu__menu js-title">Обучение</div>
            <div class="mobileMenu__slideUp js-hidden">
                <ul class="verticalMenu">
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="images/dist/iaas.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IT Безопасность <span class="verticalMenu__link-wrap"><img src="images/dist/it.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="images/dist/crm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="images/dist/bpm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="images/dist/rpa.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IP - телефония <span class="verticalMenu__link-wrap"><img src="images/dist/phone.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">СЭД <span class="verticalMenu__link-wrap"><img src="images/dist/sed.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="images/dist/erp.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">Офисные приложения <span class="verticalMenu__link-wrap"><img src="images/dist/office.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">Онлайн бухгалтерия <span class="verticalMenu__link-wrap"><img src="images/dist/online-b.svg" alt=""></span></a></li>
                </ul>
            </div>
        </li>
        <li class="mobileMenu__item">
            <div class="mobileMenu__menu js-title">Новости</div>
            <div class="mobileMenu__slideUp js-hidden">
                <ul class="verticalMenu">
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="images/dist/iaas.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IT Безопасность <span class="verticalMenu__link-wrap"><img src="images/dist/it.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="images/dist/crm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="images/dist/bpm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="images/dist/rpa.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IP - телефония <span class="verticalMenu__link-wrap"><img src="images/dist/phone.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">СЭД <span class="verticalMenu__link-wrap"><img src="images/dist/sed.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="images/dist/erp.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">Офисные приложения <span class="verticalMenu__link-wrap"><img src="images/dist/office.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="" class="verticalMenu__link">Онлайн бухгалтерия <span class="verticalMenu__link-wrap"><img src="images/dist/online-b.svg" alt=""></span></a></li>
                </ul>
            </div>
        </li>
        <li class="mobileMenu__item"><a class="mobileMenu__other" href="">Алматы, Казахстан <svg class="mobileMenu__location"><use xlink:href="images/dist/sprite.svg#location"></use></svg></a></li>
        <li class="mobileMenu__item"><a class="mobileMenu__other" href="">Не знаете что искать?</a></li>
    </ul>

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
    <!-- /.slider-main -->

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
</div>
<script src="/js/app.min.js"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
