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
<div class="modal fade" id="modal">
    <div class="modal-dialog modal-dialog-centered" id="modal-dialog" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header p-0">
                <button type="button" class="close px-3 py-2 m-0 ml-auto" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body pt-0" id="modalBody">asd
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">

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
<!--                            <div class="box-list__descript">Здесь будет текст с описанием категории которую вы выбрали...</div>-->
                        </div>
                    </li>
                    <li class="menu__item">
                        <a href="" class="menu__link">Услуги <svg class="menu__arrow"><use xlink:href="/images/dist/sprite.svg#arrow-bottom"></use></svg></a>
                        <div class="box-list menu__box-list menu__box-list--posa1">
                            <ul class="box-list__top">
                                <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                        <span class="box-list__top-wrap"><img src="/images/dist/iaas.svg" alt=""></span>
                                        <span class="box-list__top-text">IaaS</span>
                                    </a></li>
                                <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                        <span class="box-list__top-wrap"><img src="/images/dist/it.svg" alt=""></span>
                                        <span class="box-list__top-text">IT Безопасность</span>
                                    </a></li>
                                <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                        <span class="box-list__top-wrap"><img src="/images/dist/crm.svg" alt=""></span>
                                        <span class="box-list__top-text">CRM</span>
                                    </a></li>
                                <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                        <span class="box-list__top-wrap"><img src="/images/dist/bpm.svg" alt=""></span>
                                        <span class="box-list__top-text">BPM</span>
                                    </a></li>
                                <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                        <span class="box-list__top-wrap"><img src="/images/dist/rpa.svg" alt=""></span>
                                        <span class="box-list__top-text">RPA</span>
                                    </a></li>
                                <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                        <span class="box-list__top-wrap"><img src="/images/dist/phone.svg" alt=""></span>
                                        <span class="box-list__top-text">IP<br>              телефония</span>
                                    </a></li>
                                <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                        <span class="box-list__top-wrap"><img src="/images/dist/sed.svg" alt=""></span>
                                        <span class="box-list__top-text">СЭД</span>
                                    </a></li>
                                <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                        <span class="box-list__top-wrap"><img src="/images/dist/erp.svg" alt=""></span>
                                        <span class="box-list__top-text">ERP</span>
                                    </a></li>
                                <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                        <span class="box-list__top-wrap"><img src="/images/dist/office.svg" alt=""></span>
                                        <span class="box-list__top-text">Офисные приложения</span>
                                    </a></li>
                                <li class="box-list__top-item"><a href="" class="box-list__top-link">
                                        <span class="box-list__top-wrap"><img src="/images/dist/online-b.svg" alt=""></span>
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
                <div class="header__row-right">
                    <ul class="lang header__lang">
                        <li class="lang__choose">
                            <a class="lang__choose-link" href=""><img src="/images/<?=explode('-',Yii::$app->language)[0]?>.svg" style="width:20px;margin-right: 8px;margin-top: -3px;"/> <?=strtoupper(explode('-',Yii::$app->language)[0])?> <svg class="lang__choose-icon"><use xlink:href="/images/dist/sprite.svg#arrow-bottom"></use></svg></a>
                            <ul class="lang__dropdown">
                                <li class="lang__dropdown-item"><a href="/?_lang=ru" class="lang__dropdown-link"><img src="/images/ru.svg" style="width:20px;"/> RU</a></li>
                                <li class="lang__dropdown-item"><a href="/?_lang=en" class="lang__dropdown-link"><img src="/images/en.svg" style="width:20px;"/> ENG</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php if(Yii::$app->user->isGuest):?>
                        <a class="btn btn-red btn-modal" href="/site/login">Регистрация / вход</a>
                    <?php else:?>
                        <a href="/site/logout">Выход</a>
                    <?php endif?>
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
