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
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<?php if(Yii::$app->user->isGuest):?>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="popup__tabs">
                    <li class="popup__tabs-item is-active">
                        <a href="#" class="popup__tabs-link">Вход</a>
                    </li>
                    <li class="popup__tabs-item">
                        <a href="#" data-toggle="modal" data-target="registerModal" class="popup__tabs-link" data-dismiss="modal" onclick="$('#registerModal').modal();">Регистрация</a>
                    </li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" class="myform popup__myform">
                    <input type="text" class="myform__input" placeholder="Логин, почта или телефон" required>
                    <div class="myform__wrap">
                        <input type="password" class="myform__input" placeholder="Пароль" required>
                        <svg class="myform__eye js-togglePassword"><use xlink:href="images/dist/sprite.svg#eye"></use></svg>
                    </div>
                    <a href="#" class="myform__link">Напомнить пароль</a>
                    <input type="submit" value="Войти" class="btn btn-black myform__submit">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="popup__tabs">
                    <li class="popup__tabs-item">
                        <a href="#" data-toggle="modal" data-target="loginModal" class="popup__tabs-link" data-dismiss="modal" onclick="$('#loginModal').modal();">Вход</a>
                    </li>
                    <li class="popup__tabs-item is-active">
                        <a href="" class="popup__tabs-link">Регистрация</a>
                    </li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" class="myform popup__myform">
                    <input type="text" class="myform__input" placeholder="Логин" required>
                    <div class="myform__prompt">Не рекомендуем использовать в качестве логина номер телефона или адрес электронной почты</div>
                    <input type="email" class="myform__input" placeholder="Электронная почта" required>
                    <div class="myform__wrap">
                        <input type="password" class="myform__input" placeholder="Пароль">
                        <svg class="myform__eye js-togglePassword"><use xlink:href="images/dist/sprite.svg#eye"></use></svg>
                    </div>
                    <div class="myform__prompt">Не рекомендуем использовать в качестве логина номер телефона или адрес электронной почты</div>
                    <div class="agree">
                        <input type="checkbox" name="agree" class="agree__checkbox" id="agree">
                        <label for="agree" class="agree__label">
                            Я соглашаюсь с  и предоставляю своё  на обработку моих персональных данных и на получение рекламы, распространяемой по сетям электросвязи
                        </label>
                    </div>
                    <input type="submit" value="Войти" class="btn btn-black myform__submit">
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif?>
<div class="wrapper">
    <header class="header">
        <div class="container header__container">
            <div class="header__row">
                <a href="/" class="logo header__logo"><img src="/images/dist/logo.svg" alt=""></a>
                <ul class="menu">
                    <li class="menu__item"><a href="" class="menu__link">Продукты <svg class="menu__arrow"><use xlink:href="images/dist/sprite.svg#arrow-bottom"></use></svg></a></li>
                    <li class="menu__item"><a href="" class="menu__link">Услуги <svg class="menu__arrow"><use xlink:href="images/dist/sprite.svg#arrow-bottom"></use></svg></a></li>
                    <li class="menu__item"><a href="" class="menu__link">Интеграторы</a></li>
                    <li class="menu__item"><a href="" class="menu__link">Обучение</a></li>
                    <li class="menu__item"><a href="" class="menu__link">Новости</a></li>
                </ul>
                <div class="header__row-right">
                    <ul class="lang header__lang">
                        <li class="lang__choose">
                            <a class="lang__choose-link" href=""><img src="/images/<?=explode('-',Yii::$app->language)[0]?>.svg" style="width:20px;margin-right: 8px;margin-top: -3px;"/> <?=strtoupper(explode('-',Yii::$app->language)[0])?> <svg class="lang__choose-icon"><use xlink:href="images/dist/sprite.svg#arrow-bottom"></use></svg></a>
                            <ul class="lang__dropdown">
                                <li class="lang__dropdown-item"><a href="/?_lang=ru" class="lang__dropdown-link"><img src="/images/ru.svg" style="width:20px;"/> RU</a></li>
                                <li class="lang__dropdown-item"><a href="/?_lang=en" class="lang__dropdown-link"><img src="/images/en.svg" style="width:20px;"/> ENG</a></li>
                            </ul>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-red"  data-toggle="modal" data-target="#loginModal">Регистрация / вход</button>
                </div>
            </div>
            <div class="search">
                <div class="search__left">
                    <input type="text" class="search__input" placeholder="Введите свой запрос по поиску">
                    <a href="" class="btn-text">Алматы, Казахстан<svg class="btn-text__icon"><use xlink:href="images/dist/sprite.svg#location"></use></svg></a>
                </div>
                <a href="#" class="btn-text-border">Не знаете что искать?</a>

            </div>
        </div>
        <!-- /.container header__container -->
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

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
                <a href="/" class="footer__logo"><img src="images/dist/logo.svg" alt=""></a>
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
