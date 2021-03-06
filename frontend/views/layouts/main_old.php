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
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(87579836, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/87579836" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="modal-container">
    <div class="modal-background">
        <div class="modal">
            <a href="#" class="modal-close"><svg class="close popup__close"><use xlink:href="/images/dist/sprite.svg#close"></use></svg></a>
            <ul class="popup__tabs">
                <li class="popup__tabs-item is-active">
                    <a href="" class="popup__tabs-link">????????</a>
                </li>
                <li class="popup__tabs-item">
                    <a href="" class="popup__tabs-link">??????????????????????</a>
                </li>
            </ul>
            <form action="#" method="post" class="myform popup__myform">
                <input type="text" class="myform__input" placeholder="??????????, ?????????? ?????? ??????????????" required>
                <div class="myform__wrap">
                    <input type="password" class="myform__input" placeholder="????????????" required>
                    <svg class="myform__eye js-togglePassword"><use xlink:href="/images/dist/sprite.svg#eye"></use></svg>
                </div>
                <a href="#" class="myform__link">?????????????????? ????????????</a>
                <input type="submit" value="??????????" class="btn btn-black myform__submit">
            </form>
            <div class="enterHelp">
                <span class="enterHelp__title">?????????? ?? ??????????????</span>
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
<header class="header">
    <div class="container header__container">
        <a href="<?=\yii\helpers\Url::to(['/'])?>" style="max-width: 155px;" class="logo header__logo"><img src="/images/dist/logo.svg" alt=""></a>
        <ul class="menu">
            <li class="menu__item">
                <a href="<?=\yii\helpers\Url::to(['/product/index'])?>" class="menu__link"><?=Yii::t("menu","products")?> <svg class="menu__arrow"><use xlink:href="/images/dist/sprite.svg#arrow-bottom"></use></svg></a>
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
                    <div class="box-list__descript">?????????? ?????????? ?????????? ?? ?????????????????? ?????????????????? ?????????????? ???? ??????????????...</div>
                </div>
            </li>
            <li class="menu__item">
                <a href="" class="menu__link"><?=Yii::t("menu","services")?> <svg class="menu__arrow"><use xlink:href="/images/dist/sprite.svg#arrow-bottom"></use></svg></a>
                <div class="box-list menu__box-list menu__box-list--posa1">
                    <ul class="box-list__top">
                        <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                <span class="box-list__top-wrap"><img src="/images/dist/iaas.svg" alt=""></span>
                                <span class="box-list__top-text">IaaS</span>
                            </a></li>
                        <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                <span class="box-list__top-wrap"><img src="/images/dist/it.svg" alt=""></span>
                                <span class="box-list__top-text">IT ????????????????????????</span>
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
                                <span class="box-list__top-text">IP<br>              ??????????????????</span>
                            </a></li>
                        <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                <span class="box-list__top-wrap"><img src="/images/dist/sed.svg" alt=""></span>
                                <span class="box-list__top-text">??????</span>
                            </a></li>
                        <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                <span class="box-list__top-wrap"><img src="/images/dist/erp.svg" alt=""></span>
                                <span class="box-list__top-text">ERP</span>
                            </a></li>
                        <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                <span class="box-list__top-wrap"><img src="/images/dist/office.svg" alt=""></span>
                                <span class="box-list__top-text">?????????????? ????????????????????</span>
                            </a></li>
                        <li class="box-list__top-item"><a href="/integrators/index" class="box-list__top-link">
                                <span class="box-list__top-wrap"><img src="/images/dist/online-b.svg" alt=""></span>
                                <span class="box-list__top-text">???????????? ??????????????????????</span>
                            </a></li>
                    </ul>
                    <div class="box-list__descript">...</div>
                </div>
            </li>
            <li class="menu__item"><a href="/integrators/index" class="menu__link"><?=Yii::t("menu","integrators")?></a></li>
            <li class="menu__item"><a href="" class="menu__link"><?=Yii::t("menu","learn")?></a></li>
            <li class="menu__item"><a href="/news/index" class="menu__link"><?=Yii::t("menu","news")?></a></li>
        </ul>
        <div class="header__right">
            <a class="location header__location" href=""><svg class="location__icon"><use xlink:href="/images/dist/sprite.svg#location"></use></svg></a>
            <a href="" class="search-link header__search-link"><svg class="search-link__icon"><use xlink:href="/images/dist/sprite.svg#loupe"></use></svg></a>
            <ul class="lang header__lang">
                <li class="lang__choose">
                    <a class="lang__choose-link" href=""><img src="/images/<?=explode('-',Yii::$app->language)[0]?>.svg" style="width:20px;margin-right: 8px;margin-top: -3px;"/> <?=strtoupper(explode('-',Yii::$app->language)[0])?> <svg class="lang__choose-icon"><use xlink:href="/images/dist/sprite.svg#arrow-bottom"></use></svg></a>
                    <ul class="lang__dropdown">
                        <li class="lang__dropdown-item"><a href="/?_lang=ru" class="lang__dropdown-link"><img src="/images/ru.svg" style="width:20px;"/> RU</a></li>
                        <li class="lang__dropdown-item"><a href="/?_lang=en" class="lang__dropdown-link"><img src="/images/en.svg" style="width:20px;"/> ENG</a></li>
                        <li class="lang__dropdown-item"><a href="/?_lang=uae" class="lang__dropdown-link"><img src="/images/ar.svg" style="width:20px;"/> UAE</a></li>
                    </ul>
                </li>
            </ul>
            <a href="#" class="blueBtn button"><?=Yii::t("app","register")?> / <?=Yii::t("app","login")?></a>
        </div>
        <!-- /.header__right -->
        <a href="" class="header__mobile js-menuBtn"></a>
    </div>
    <!-- /.container header__container -->
    <div class="container header__bottom">
        <?=Yii::t("app","head_text");?>

    </div>
</header>
<ul class="mobileMenu" id="mobileMenu">
    <li class="mobileMenu__item mobileMenu__item-flex">
        <a href="" class="mobileMenu__link">
            <?=Yii::t("app","register")?> / <?=Yii::t("app","login")?> <svg class="reg mobileMenu__reg"><use xlink:href="/images/dist/sprite.svg#user"></use></svg>
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
        <div class="mobileMenu__menu js-title">????????????????</div>
        <div class="mobileMenu__slideUp js-hidden">
            <ul class="verticalMenu">
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="/images/dist/iaas.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IT ???????????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/it.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="/images/dist/crm.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="/images/dist/bpm.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="/images/dist/rpa.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IP - ?????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/phone.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">?????? <span class="verticalMenu__link-wrap"><img src="/images/dist/sed.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="/images/dist/erp.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">?????????????? ???????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/office.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">???????????? ?????????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/online-b.svg" alt=""></span></a></li>
            </ul>
        </div>
    </li>
    <li class="mobileMenu__item">
        <div class="mobileMenu__menu js-title">????????????</div>
        <div class="mobileMenu__slideUp js-hidden">
            <ul class="verticalMenu">
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="/images/dist/iaas.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IT ???????????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/it.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="/images/dist/crm.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="/images/dist/bpm.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="/images/dist/rpa.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IP - ?????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/phone.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">?????? <span class="verticalMenu__link-wrap"><img src="/images/dist/sed.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="/images/dist/erp.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">?????????????? ???????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/office.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">???????????? ?????????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/online-b.svg" alt=""></span></a></li>
            </ul>
        </div>
    </li>
    <li class="mobileMenu__item">
        <div class="mobileMenu__menu js-title">??????????????????????</div>
        <div class="mobileMenu__slideUp js-hidden">
            <ul class="verticalMenu">
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="/images/dist/iaas.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IT ???????????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/it.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="/images/dist/crm.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="/images/dist/bpm.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="/images/dist/rpa.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IP - ?????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/phone.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">?????? <span class="verticalMenu__link-wrap"><img src="/images/dist/sed.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="/images/dist/erp.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">?????????????? ???????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/office.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">???????????? ?????????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/online-b.svg" alt=""></span></a></li>
            </ul>
        </div>
    </li>
    <li class="mobileMenu__item">
        <div class="mobileMenu__menu js-title">????????????????</div>
        <div class="mobileMenu__slideUp js-hidden">
            <ul class="verticalMenu">
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="/images/dist/iaas.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IT ???????????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/it.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="/images/dist/crm.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="/images/dist/bpm.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="/images/dist/rpa.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IP - ?????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/phone.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">?????? <span class="verticalMenu__link-wrap"><img src="/images/dist/sed.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="/images/dist/erp.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">?????????????? ???????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/office.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">???????????? ?????????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/online-b.svg" alt=""></span></a></li>
            </ul>
        </div>
    </li>
    <li class="mobileMenu__item">
        <div class="mobileMenu__menu js-title">??????????????</div>
        <div class="mobileMenu__slideUp js-hidden">
            <ul class="verticalMenu">
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="/images/dist/iaas.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IT ???????????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/it.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="/images/dist/crm.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="/images/dist/bpm.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="/images/dist/rpa.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">IP - ?????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/phone.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">?????? <span class="verticalMenu__link-wrap"><img src="/images/dist/sed.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="/images/dist/erp.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">?????????????? ???????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/office.svg" alt=""></span></a></li>
                <li class="verticalMenu__item"><a href="" class="verticalMenu__link">???????????? ?????????????????????? <span class="verticalMenu__link-wrap"><img src="/images/dist/online-b.svg" alt=""></span></a></li>
            </ul>
        </div>
    </li>
    <li class="mobileMenu__item"><a class="mobileMenu__other" href="">????????????, ?????????????????? <svg class="mobileMenu__location"><use xlink:href="/images/dist/sprite.svg#location"></use></svg></a></li>
    <li class="mobileMenu__item"><a class="mobileMenu__other" href="">???? ???????????? ?????? ?????????????</a></li>
</ul>
<!-- /.mobileMenu -->
<?=$content?>

<?php $this->endBody() ?>
<footer class="footer">
    <div class="container footer__container">
        <nav class="footer__nav">
            <h5 class="h5 footer__title"><?=Yii::t("menu","products")?></h5>
            <div class="footer__nav-wrap">
                <ul class="footer__menu">
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">IaaS</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">IT ????????????????????????</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">CRM</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">BPM</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">RPA</a></li>
                </ul>
                <ul class="footer__menu">
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">IP ??????????????????</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">??????</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">ERP</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">?????????????? ????????????????????</a></li>
                    <li class="footer__menu-item"><a href="" class="footer__menu-link">???????????? ??????????????????????</a></li>
                </ul>
            </div>
            <!-- /.footer__nav-wrap -->
        </nav>
        <nav class="footer__nav">
            <h5 class="h5 footer__title">????????????</h5>
            <ul class="footer__menu">
                <li class="footer__menu-item"><a href="" class="footer__menu-link">??????????????????????</a></li>
                <li class="footer__menu-item"><a href="" class="footer__menu-link">???????????????????? ????</a></li>
                <li class="footer__menu-item"><a href="" class="footer__menu-link">????????????????????</a></li>
                <li class="footer__menu-item"><a href="" class="footer__menu-link">????????????????????</a></li>
            </ul>
        </nav>
        <nav class="footer__nav">
            <h5 class="h5 footer__title">HH</h5>
            <ul class="footer__menu">
                <li class="footer__menu-item"><a href="" class="footer__menu-link">?????????? ????????????????????</a></li>
                <li class="footer__menu-item"><a href="" class="footer__menu-link">?????????? ????????????</a></li>
            </ul>
        </nav>
        <nav class="footer__nav">
            <h5 class="h5 footer__title">??????????</h5>
            <ul class="footer__menu">
                <li class="footer__menu-item"><a href="" class="footer__menu-link">?????????????????? ????????????????????????</a></li>
                <li class="footer__menu-item"><a href="" class="footer__menu-link">???????????????? ?? 0</a></li>
                <li class="footer__menu-item"><a href="" class="footer__menu-link">?????????????? ??????????????????????</a></li>
            </ul>
        </nav>
        <nav class="footer__nav">
            <a href="/" class="footer__logo"><img src="/images/dist/logo.svg" alt=""></a>
            <ul class="footer__menu">
                <li class="footer__menu-item"><a href="" class="footer__menu-link">?????????? ??????????</a></li>
                <li class="footer__menu-item"><a href="" class="footer__menu-link">??????????????????</a></li>
                <li class="footer__menu-item"><a href="" class="footer__menu-link">F.A.Q.</a></li>
                <li class="footer__menu-item"><a href="" class="footer__menu-link">???????????????????????????????? ??????????????</a></li>
                <li class="footer__menu-item"><a href="" class="footer__menu-link">???????????? ???????????? ????????????????????????</a></li>
            </ul>
        </nav>
    </div>
    <!-- /.container footer__container -->
</footer>
</body>
</html>
<?php $this->endPage();
