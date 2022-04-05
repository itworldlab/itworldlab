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
$company_categories = \backend\models\company\CompanyCategory::GetAll();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel="manifest" href="/images/site.webmanifest">
    <link rel="mask-icon" href="/images/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Yandex.Metrika counter -->
   <!-- <script type="text/javascript" >
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
    <noscript><div><img src="https://mc.yandex.ru/watch/87579836" style="position:absolute; left:-9999px;" alt="" /></div></noscript>-->


    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<style>
    .pagination{
        margin-top:50px;
        margin-bottom: 25px;
    }
    .pagination > li > a{
        padding: 10px;
        border: 1px solid #222;
        margin-left: 5px;
        margin-right: 5px;
    }
    .news__grid-img{
        max-height: 250px;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded",function(){
        $(".btn-modal").click(function(e){
            e.preventDefault();
            // $('#test').modal();
            $("#modalBody").html('<div style="width:100%;text-align:center;"><img src="/images/loader.gif"/></div>');
            // $("#modal").modal();
            if($(this).hasClass("btn-modal-lg")){
                $("#modal-dialog").addClass("modal-lg2");
            }
            var href = $(this).attr("href");

            $.ajax({
                type:"get",
                url:href,
                success:function(res){
                    $("#modalBody").html(res);
                    // $("#modal").modal();
                },
                error:function(xhr){
                    $("#modalBody").html(xhr.responseText);
                    // $("#modal").modal();
                }
            })
        })
    });
</script>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" id="modalBody"></div>
        </div>
    </div>
</div>
<div id="modal-container">
    <div class="modal-background">
        <div class="modal">
            <a href="#" class="modal-close"><svg class="close popup__close"><use xlink:href="/images/dist/sprite.svg#close"></use></svg></a>

        </div>
    </div>
</div>
<div class="wrapper">
    <header class="header header--static">
        <div class="container header__container">
            <a href="<?=\yii\helpers\Url::to(['/'])?>" class="logo header__logo"><img src="/images/logo.svg" alt=""></a>
            <ul class="menu">
                <li class="menu__item">
                    <a href="<?=\yii\helpers\Url::to(['/product/index'])?>" class="menu__link"><?=Yii::t("menu","products")?> <svg class="menu__arrow"><use xlink:href="/images/dist/sprite.svg#arrow-bottom"></use></svg></a>
                    <div class="box-list menu__box-list">
                        <ul class="box-list__top">
                            <?php foreach($product_categories as $category):?>
                                <li class="box-list__top-item">
                                    <a href="<?=\yii\helpers\Url::to(['/product/index','category_id'=>$category->id])?>" class="box-list__top-link">
                                        <span class="box-list__top-wrap"><img src="/uploads/<?=$category->icon?>"></span>
                                        <span class="box-list__top-text"><?=$category->name?></span>
                                    </a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </li>
                <li class="menu__item">
                    <a href="<?=\yii\helpers\Url::to(['/company/index'])?>" class="menu__link"><?=Yii::t("menu","services")?></a>
                </li>
                <li class="menu__item"><a href="<?=\yii\helpers\Url::to(['/education/index'])?>" class="menu__link"><?=Yii::t("menu","learn")?></a></li>
                <li class="menu__item"><a href="<?=\yii\helpers\Url::to(['/news/index'])?>" class="menu__link"><?=Yii::t("menu","news")?></a></li>
            </ul>
            <div class="header__right">
                <a class="location header__location" href="#"><svg class="location__icon"><use xlink:href="/images/dist/sprite.svg#location"></use></svg></a>
                <a href="#" class="search-link header__search-link"><svg class="search-link__icon"><use xlink:href="/images/dist/sprite.svg#loupe"></use></svg></a>
                <ul class="lang header__lang">
                    <li class="lang__choose">
                        <a class="lang__choose-link" href="#"><img src="/images/<?=explode('-',Yii::$app->language)[0]?>.svg" style="width:20px;margin-right: 8px;margin-top: -3px;"/> <?=strtoupper(explode('-',Yii::$app->language)[0])?> <svg class="lang__choose-icon"><use xlink:href="/images/dist/sprite.svg#arrow-bottom"></use></svg></a>
                        <ul class="lang__dropdown">
                            <li class="lang__dropdown-item"><a href="/?_lang=ru" class="lang__dropdown-link"><img src="/images/ru.svg" style="width:20px;"/> RU</a></li>
                            <li class="lang__dropdown-item"><a href="/?_lang=en" class="lang__dropdown-link"><img src="/images/en.svg" style="width:20px;"/> ENG</a></li>
                        </ul>
                    </li>
                </ul>
                <a href="<?=\yii\helpers\Url::to(['/site/login','modal'=>1])?>" data-toggle="modal" data-target="#modal" class="blueBtn header__blueBtn js-btn" style="font-weight: bold;"><?=Yii::t("app","register")?> / <?=Yii::t("app","login")?></a>
            </div>
            <!-- /.header__right -->
            <a href="#" class="header__mobile js-menuBtn"><img src="/images/dist/Menu-white.svg"/></a>
        </div>
        <!-- /.container header__container -->

    </header>
    <ul class="mobileMenu" id="mobileMenu">
        <li class="mobileMenu__item mobileMenu__item-flex">
            <a href="#" class="mobileMenu__link">
                Регистрация / вход <svg class="reg mobileMenu__reg"><use xlink:href="/images/dist/sprite.svg#user"></use></svg>
            </a>
        </li>
        <li class="mobileMenu__item">
            <div class="mobileMenu__lang js-title">
                RU
            </div>
            <ul class="mobileMenu__langList js-hidden">
                <li><a href="#">KZ</a></li>
                <li><a href="#">ENG</a></li>
                <li><a href="#">CH</a></li>
            </ul>
        </li>
        <li class="mobileMenu__item">
            <div class="mobileMenu__menu js-title">Продукты</div>
            <div class="mobileMenu__slideUp js-hidden">
                <ul class="verticalMenu">
                    <?php foreach($product_categories as $category):?>
                        <li class="verticalMenu__item">
                            <a href="<?=\yii\helpers\Url::to(['/product/index','category_id'=>$category->id])?>" class="verticalMenu__link"><?=$category->name?> <span class="verticalMenu__link-wrap"><img src="/uploads/<?=$category->icon?>" alt=""></span></a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </li>
        <li class="mobileMenu__item">
            <div class="mobileMenu__menu js-title">Услуги</div>
            <div class="mobileMenu__slideUp js-hidden">
                <ul class="verticalMenu">
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="/images/dist/iaas.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">IT Безопасность <span class="verticalMenu__link-wrap"><img src="/images/dist/it.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="/images/dist/crm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="/images/dist/bpm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="/images/dist/rpa.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">IP - телефония <span class="verticalMenu__link-wrap"><img src="/images/dist/phone.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">СЭД <span class="verticalMenu__link-wrap"><img src="/images/dist/sed.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="/images/dist/erp.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">Офисные приложения <span class="verticalMenu__link-wrap"><img src="/images/dist/office.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">Онлайн бухгалтерия <span class="verticalMenu__link-wrap"><img src="/images/dist/online-b.svg" alt=""></span></a></li>
                </ul>
            </div>
        </li>
        <li class="mobileMenu__item">
            <div class="mobileMenu__menu js-title">Интеграторы</div>
            <div class="mobileMenu__slideUp js-hidden">
                <ul class="verticalMenu">
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="/images/dist/iaas.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">IT Безопасность <span class="verticalMenu__link-wrap"><img src="/images/dist/it.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="/images/dist/crm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="/images/dist/bpm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="/images/dist/rpa.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">IP - телефония <span class="verticalMenu__link-wrap"><img src="/images/dist/phone.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">СЭД <span class="verticalMenu__link-wrap"><img src="/images/dist/sed.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="/images/dist/erp.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">Офисные приложения <span class="verticalMenu__link-wrap"><img src="/images/dist/office.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">Онлайн бухгалтерия <span class="verticalMenu__link-wrap"><img src="/images/dist/online-b.svg" alt=""></span></a></li>
                </ul>
            </div>
        </li>
        <li class="mobileMenu__item">
            <div class="mobileMenu__menu js-title">Обучение</div>
            <div class="mobileMenu__slideUp js-hidden">
                <ul class="verticalMenu">
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="/images/dist/iaas.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">IT Безопасность <span class="verticalMenu__link-wrap"><img src="/images/dist/it.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="/images/dist/crm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="/images/dist/bpm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="/images/dist/rpa.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">IP - телефония <span class="verticalMenu__link-wrap"><img src="/images/dist/phone.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">СЭД <span class="verticalMenu__link-wrap"><img src="/images/dist/sed.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="/images/dist/erp.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">Офисные приложения <span class="verticalMenu__link-wrap"><img src="/images/dist/office.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">Онлайн бухгалтерия <span class="verticalMenu__link-wrap"><img src="/images/dist/online-b.svg" alt=""></span></a></li>
                </ul>
            </div>
        </li>
        <li class="mobileMenu__item">
            <div class="mobileMenu__menu js-title">Новости</div>
            <div class="mobileMenu__slideUp js-hidden">
                <ul class="verticalMenu">
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">IaaS <span class="verticalMenu__link-wrap"><img src="/images/dist/iaas.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">IT Безопасность <span class="verticalMenu__link-wrap"><img src="/images/dist/it.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">CRM <span class="verticalMenu__link-wrap"><img src="/images/dist/crm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">BPM <span class="verticalMenu__link-wrap"><img src="/images/dist/bpm.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">RPA <span class="verticalMenu__link-wrap"><img src="/images/dist/rpa.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">IP - телефония <span class="verticalMenu__link-wrap"><img src="/images/dist/phone.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">СЭД <span class="verticalMenu__link-wrap"><img src="/images/dist/sed.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">ERP <span class="verticalMenu__link-wrap"><img src="/images/dist/erp.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">Офисные приложения <span class="verticalMenu__link-wrap"><img src="/images/dist/office.svg" alt=""></span></a></li>
                    <li class="verticalMenu__item"><a href="#" class="verticalMenu__link">Онлайн бухгалтерия <span class="verticalMenu__link-wrap"><img src="/images/dist/online-b.svg" alt=""></span></a></li>
                </ul>
            </div>
        </li>
        <li class="mobileMenu__item"><a class="mobileMenu__other" href="">Алматы, Казахстан <svg class="mobileMenu__location"><use xlink:href="/images/dist/sprite.svg#location"></use></svg></a></li>
        <li class="mobileMenu__item"><a class="mobileMenu__other" href="">Не знаете что искать?</a></li>
    </ul>
    <!-- /.mobileMenu -->
    <?=$content?>

    <footer class="footer">
        <div class="container footer__container">
            <nav class="footer__nav">
                <h5 class="h5 footer__title"><?=Yii::t("menu","products")?></h5>
                <div class="footer__nav-wrap">
                    <ul class="footer__menu">
                        <?php $i = 0; foreach($product_categories as $category):?>
                            <?php if($i < 5):?>
                            <li class="footer__menu-item"><a href="<?=\yii\helpers\Url::to(['/product/index','category_id'=>$category->id])?>" class="footer__menu-link"><?=$category->name?></a></li>
                        <?php endif; $i++; endforeach;?>
                    </ul>
                    <ul class="footer__menu">
                        <?php $i = 0; foreach($product_categories as $category):?>
                            <?php if($i >= 5):?>
                            <li class="footer__menu-item"><a href="<?=\yii\helpers\Url::to(['/product/index','category_id'=>$category->id])?>" class="footer__menu-link"><?=$category->name?></a></li>
                        <?php endif; $i++; endforeach;?>
                    </ul>
                </div>
                <!-- /.footer__nav-wrap -->
            </nav>
            <nav class="footer__nav">
                <h5 class="h5 footer__title"><?=Yii::t("menu","services")?></h5>
                <ul class="footer__menu">
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"><?=Yii::t("menu","integrators")?></a></li>
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"><?=Yii::t("menu","software_development")?></a></li>
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"><?=Yii::t("menu","autsorsing")?></a></li>
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"><?=Yii::t("menu","consulting")?></a></li>
                </ul>
            </nav>
            <nav class="footer__nav">
                <h5 class="h5 footer__title">HH</h5>
                <ul class="footer__menu">
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"><?=Yii::t("menu","find_employee")?></a></li>
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"><?=Yii::t("menu","find_job")?></a></li>
                </ul>
            </nav>
            <nav class="footer__nav">
                <h5 class="h5 footer__title"><?=Yii::t("menu","cources")?></h5>
                <ul class="footer__menu">
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"><?=Yii::t("menu","lvl_up")?></a></li>
                    <li><a href="#"><?=Yii::t("menu","learn_from_zero")?></a></li>
                    <li><a href="#"><?=Yii::t("menu","learn_empl")?></a></li>
                </ul>
            </nav>
            <nav class="footer__nav">
                <a href="<?=\yii\helpers\Url::to(['/'])?>" class="footer__logo"><img src="/images/logo.svg" alt=""></a>
                <ul class="footer__menu">
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"><?=Yii::t("menu","sitemap")?></a></li>
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"><?=Yii::t("menu","support2")?></a></li>
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link">F.A.Q.</a></li>
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"><?=Yii::t("menu","register_product")?></a></li>
                    <li class="footer__menu-item"><a href="#" class="footer__menu-link"><?=Yii::t("menu","get_investor_req")?></a></li>
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
