<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>sfsdf
<div class="container" style="margin-top:160px;">
    <div class="row">
        <div class="col-12">
            <div class="popup">
                <svg class="close popup__close"><use xlink:href="/images/dist/sprite.svg#close"></use></svg>
                <ul class="popup__tabs">
                    <li class="popup__tabs-item is-active">
                        <a href="" class="popup__tabs-link">Вход</a>
                    </li>
                    <li class="popup__tabs-item">
                        <a href="" class="popup__tabs-link">Регистрация</a>
                    </li>
                </ul>
                <form action="#" method="post" class="myform popup__myform">
                    <input type="text" class="myform__input" placeholder="Логин, почта или телефон" required>
                    <div class="myform__wrap">
                        <input type="password" class="myform__input" placeholder="Пароль" required>
                        <svg class="myform__eye js-togglePassword"><use xlink:href="/images/dist/sprite.svg#eye"></use></svg>
                    </div>
                    <a href="#" class="myform__link">Напомнить пароль</a>
                    <input type="submit" value="Войти" class="btn btn-black myform__submit">
                </form>
                <div class="enterHelp">
                    <span class="enterHelp__title">Войти с помощью</span>
                    <ul class="social">
                        <li class="social__item"><a href="" class="social__link">
                                <svg class="social__icon social__icon-google"><use xlink:href="/images/dist/sprite.svg#google"></use></svg>
                            </a></li>
                        <li class="social__item"><a href="" class="social__link">
                                <svg class="social__icon social__icon-fb"><use xlink:href="/images/dist/sprite.svg#fb"></use></svg>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>sdfsdf
