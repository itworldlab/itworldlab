<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
$product_categories = \backend\models\product\ProductCategory::find()->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<header class="header">
    <div class="container header__container">
        <div class="header__row">
            <a href="/" class="logo header__logo"><img src="/images/dist/logo.svg" alt=""></a>
            <ul class="menu">
                <li class="menu__item">
                    <a href="/product/index" class="menu__link">Продукты <svg class="menu__arrow"><use xlink:href="/images/dist/sprite.svg#arrow-bottom"></use></svg></a>
                    <div class="box-list menu__box-list">
                        <ul class="box-list__top">
                            <?php foreach($product_categories as $category):?>
                                <li class="box-list__top-item">
                                    <a href="<?=\yii\helpers\Url::to(['/product/index','category_id'=>$category->id])?>" class="box-list__top-link">
                                        <span class="box-list__top-wrap"><img src="/uploads/<?=$category->icon?>" alt=""></span>
                                        <span class="box-list__top-text"><?=$category->name?></span>
                                    </a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                        <div class="box-list__descript">Здесь будет текст с описанием категории которую вы выбрали...</div>
                    </div>
                </li>
                <li class="menu__item">
                    <a href="/integrators/index" class="menu__link">Услуги <svg class="menu__arrow"><use xlink:href="/images/dist/sprite.svg#arrow-bottom"></use></svg></a>
                    <div class="box-list menu__box-list menu__box-list--posa1">
                        <ul class="box-list__top">
                            <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="/images/dist/iaas.svg" alt=""></span>
                                    <span class="box-list__top-text">IaaS</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="/images/dist/it.svg" alt=""></span>
                                    <span class="box-list__top-text">IT Безопасность</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="/images/dist/crm.svg" alt=""></span>
                                    <span class="box-list__top-text">CRM</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="/images/dist/bpm.svg" alt=""></span>
                                    <span class="box-list__top-text">BPM</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="/images/dist/rpa.svg" alt=""></span>
                                    <span class="box-list__top-text">RPA</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="/images/dist/phone.svg" alt=""></span>
                                    <span class="box-list__top-text">IP<br>              телефония</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="/images/dist/sed.svg" alt=""></span>
                                    <span class="box-list__top-text">СЭД</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="/images/dist/erp.svg" alt=""></span>
                                    <span class="box-list__top-text">ERP</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="/images/dist/office.svg" alt=""></span>
                                    <span class="box-list__top-text">Офисные приложения</span>
                                </a></li>
                            <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                    <span class="box-list__top-wrap"><img src="/images/dist/online-b.svg" alt=""></span>
                                    <span class="box-list__top-text">Онлайн бухгалтерия</span>
                                </a></li>
                        </ul>
                        <div class="box-list__descript">Здесь будет текст с описанием категории которую вы выбрали...</div>
                    </div>
                </li>
                <li class="menu__item"><a href="/integrators/index" class="menu__link">Интеграторы</a></li>
                <li class="menu__item"><a href="/news/index" class="menu__link">Новости</a></li>
            </ul>
            <div class="header__row-right">
                <ul class="lang header__lang">
                    <li class="lang__choose">
                        <a class="lang__choose-link" href="">RU <svg class="lang__choose-icon"><use xlink:href="/images/dist/sprite.svg#arrow-bottom"></use></svg></a>
                        <ul class="lang__dropdown">
                            <li class="lang__dropdown-item"><a href="" class="lang__dropdown-link">KZ</a></li>
                            <li class="lang__dropdown-item"><a href="" class="lang__dropdown-link">ENG</a></li>
                            <li class="lang__dropdown-item"><a href="" class="lang__dropdown-link">RU</a></li>
                        </ul>
                    </li>
                </ul>
                <button type="button" class="btn btn-red">Регистрация / вход</button>
            </div>
            <div class="header__mobile">
                <a href="" class="header__searchBtn"><img src="/images/dist/search.svg" alt=""></a>
                <a href="" class="header__menu js-menuBtn"></a>
            </div>
        </div>
        <div class="search">
            <div class="search__left">
                <input type="text" class="search__input" placeholder="Введите свой запрос по поиску">
                <a href="" class="btn-text">Алматы, Казахстан<svg class="btn-text__icon"><use xlink:href="/images/dist/sprite.svg#location"></use></svg></a>
            </div>
            <a href="#" class="btn-text-border">Не знаете что искать?</a>

        </div>
    </div>
    <!-- /.container header__container -->
</header>
<ul class="mobileMenu" id="mobileMenu">
    <li class="mobileMenu__item mobileMenu__item-flex">
        <a href="" class="mobileMenu__link">
            Регистрация / вход <svg class="reg mobileMenu__reg"><use xlink:href="/images/dist/sprite.svg#user"></use></svg>
        </a>
    </li>
    <li class="mobileMenu__item">
        <div class="mobileMenu__lang js-title">
            RU
        </div>
        <ul class="mobileMenu__langList js-hidden">
            <li><a href="">KZ</a></li>
            <li><a href="">ENG</a></li>
            <li><a href="">RU</a></li>
        </ul>
    </li>
    <li class="mobileMenu__item">
        <div class="mobileMenu__menu js-title">Продукты</div>
        <div class="mobileMenu__slideUp js-hidden">
            <ul class="verticalMenu">
                <?php foreach($product_categories as $category):?>
                    <li class="verticalMenu__item">
                        <a href="<?=\yii\helpers\Url::to(['/product/index','category_id'=>$category->id])?>" class="verticalMenu__link">
                            <?=$category->name?>
                            <span class="verticalMenu__link-wrap"><img src="/uploads/<?=$category->icon?>" alt=""></span>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </li>
    <li class="mobileMenu__item">
        <div class="mobileMenu__menu js-title">Услуги</div>
        <div class="mobileMenu__slideUp js-hidden">
            <ul class="verticalMenu">
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="/images/dist/iaas.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">IT Безопасность <span class="verticalMenu__link-wrap"><img src="/images/dist/it.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="/images/dist/crm.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="/images/dist/bpm.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="/images/dist/rpa.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">IP - телефония <span class="verticalMenu__link-wrap"><img src="/images/dist/phone.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">СЭД <span class="verticalMenu__link-wrap"><img src="/images/dist/sed.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="/images/dist/erp.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">Офисные приложения <span class="verticalMenu__link-wrap"><img src="/images/dist/office.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">Онлайн бухгалтерия <span class="verticalMenu__link-wrap"><img src="/images/dist/online-b.svg" alt=""></span></a></li>
            </ul>
        </div>
    </li>
    <li class="mobileMenu__item">
        <div class="mobileMenu__menu js-title">Интеграторы</div>
        <div class="mobileMenu__slideUp js-hidden">
            <ul class="verticalMenu">
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="/images/dist/iaas.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">IT Безопасность <span class="verticalMenu__link-wrap"><img src="/images/dist/it.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="/images/dist/crm.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="/images/dist/bpm.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="/images/dist/rpa.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">IP - телефония <span class="verticalMenu__link-wrap"><img src="/images/dist/phone.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">СЭД <span class="verticalMenu__link-wrap"><img src="/images/dist/sed.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="/images/dist/erp.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">Офисные приложения <span class="verticalMenu__link-wrap"><img src="/images/dist/office.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="/integrators/index" class="verticalMenu__link">Онлайн бухгалтерия <span class="verticalMenu__link-wrap"><img src="/images/dist/online-b.svg" alt=""></span></a></li>
            </ul>
        </div>
    </li>
    <li class="mobileMenu__item"><a class="mobileMenu__other" href="/">Обучение <svg class="mobileMenu__location"><use xlink:href="/images/dist/sprite.svg#location"></use></svg></a></li>
    <li class="mobileMenu__item"><a class="mobileMenu__other" href="/news/index">Новости <svg class="mobileMenu__location"><use xlink:href="/images/dist/sprite.svg#location"></use></svg></a></li>
    <li class="mobileMenu__item"><a class="mobileMenu__other" href="">Алматы, Казахстан <svg class="mobileMenu__location"><use xlink:href="/images/dist/sprite.svg#location"></use></svg></a></li>
    <li class="mobileMenu__item"><a class="mobileMenu__other" href="">Не знаете что искать?</a></li>
</ul>
<div class="wrapper">

    <!-- /.mobileMenu -->
    <?=$content?>




    <footer class="footer">
        <div class="container footer__container">
            <nav class="footer__nav">
                <h5 class="h5 footer__title">Продукты</h5>
                <div class="footer__nav-wrap">
                    <ul class="footer__menu">
                        <li class="footer__menu-item"><a href="" class="footer__menu-link">IaaS</a></li>
                        <li class="footer__menu-item"><a href="" class="footer__menu-link">IT Безопасность</a></li>
                        <li class="footer__menu-item"><a href="" class="footer__menu-link">CRM</a></li>
                        <li class="footer__menu-item"><a href="" class="footer__menu-link">BPM</a></li>
                        <li class="footer__menu-item"><a href="" class="footer__menu-link">RPA</a></li>
                    </ul>
                    <ul class="footer__menu">
                        <li class="footer__menu-item"><a href="" class="footer__menu-link">IP телефония</a></li>
                        <li class="footer__menu-item"><a href="" class="footer__menu-link">СЭД</a></li>
                        <li class="footer__menu-item"><a href="" class="footer__menu-link">ERP</a></li>
                        <li class="footer__menu-item"><a href="" class="footer__menu-link">Офисные приложения</a></li>
                        <li class="footer__menu-item"><a href="" class="footer__menu-link">Онлайн бухгалтерия</a></li>
                    </ul>
                </div>
                <!-- /.footer__nav-wrap -->
            </nav>
            <nav class="footer__nav">
                <h5 class="h5 footer__title">Услуги</h5>
                <ul class="footer__menu">
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Интеграторы</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Разработка ПО</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Аутсорсинг</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Консалтинг</a></li>
                </ul>
            </nav>
            <nav class="footer__nav">
                <h5 class="h5 footer__title">HH</h5>
                <ul class="footer__menu">
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Найти сотрудника</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Поиск работы</a></li>
                </ul>
            </nav>
            <nav class="footer__nav">
                <h5 class="h5 footer__title">Курсы</h5>
                <ul class="footer__menu">
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Повышение квалификации</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Обучение с 0</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Обучени сотрудников</a></li>
                </ul>
            </nav>
            <nav class="footer__nav">
                <a href="/" class="footer__logo"><img src="/images/dist/logo.svg" alt=""></a>
                <ul class="footer__menu">
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Карта сайта</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Поддержка</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">F.A.Q.</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Зарегистрировать продукт</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">Подать заявку интеграторам</a></li>
                </ul>
            </nav>
        </div>
        <!-- /.container footer__container -->
    </footer>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
