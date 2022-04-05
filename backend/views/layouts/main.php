<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="Description" content="">
    <meta name="Author" content="">
    <meta name="Keywords" content=""/>-->

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="modal fade" id="modal"  data-animation-in="bounceIn"  data-animation-out="bounceOut">
    <div class="modal-dialog modal-dialog-centered" id="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body" id="modalBody">
            </div>
        </div>
    </div>
</div>
<script>
    Noty.overrideDefaults({
        theme: "limitless",
        layout: "topRight",
        type: "alert",
        timeout: 2500
    });
    var modal = $("#modal");
    modal.on('show.bs.modal', function (e) {
        var anim = $(this).attr('data-animation-in');
        modalAnimation(anim);
    })
    modal.on('hide.bs.modal', function (e) {
        var anim = $(this).attr('data-animation-out');
        modalAnimation(anim);
    })
    function modalAnimation(animation) {
        $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + animation + ' animated');
    }

    document.addEventListener("DOMContentLoaded",function(){
        $(".btn-modal").click(function(e){
            e.preventDefault();
            // $('#test').modal();
            $("#modalBody").html('<img src="/img/loader.gif"/>');
            $("#modal").modal();
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
<?= \common\widgets\Alert::widget() ?>
<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand text-center text-lg-left">
        <a href="/" class="d-inline-block">
            <img src="/img/logo.png" class="d-none d-sm-block" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <span class="navbar-text ml-md-3">
				<span class="badge badge-mark border-orange-300 mr-2"></span>
				 <?= Yii::$app->user->identity['name'] ?>!
			</span>

        <ul class="navbar-nav ml-md-auto">
            <li class="nav-item">
                <a href="/site/logout" class="navbar-nav-link">
                    <i class="icon-switch2"></i>
                    <span class="d-md-none ml-2">Выход</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            Меню
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->


        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- Main navigation -->
            <div class="card card-sidebar-mobile" id="menu">

                <?php
                $items = [
                    [
                        "label" => '<i class="icon-home4"></i> Главная',
                        'url' => Url::to(['/']),
//                        'active' => $_SERVER['REQUEST_URI'] == "/",
                        'options' => ['class' => 'nav-item']
                    ],

                    [
                        "label" => '<i class="icon-users4"></i> Переводы',
                        'url' => Url::to(['/lang/index']),
                        'active' => strpos($_SERVER['REQUEST_URI'],"/lang/index") !== false,
                        'options' => ['class' => 'nav-item']
                    ],

                    [
                        "label" => '<i class="icon-users4"></i> Пользователи',
                        'url' => Url::to(['/user/index']),
                        'active' => strpos($_SERVER['REQUEST_URI'],"/user/index") !== false,
                        'options' => ['class' => 'nav-item']
                    ],

                    [
                        "label" => '<i class="icon-glasses-3d2"></i> Регионы',
                        'url' => Url::to(['/region/index']),
                        'active' => strpos($_SERVER['REQUEST_URI'],"/region/index") !== false,
                        'options' => ['class' => 'nav-item']
                    ],

                    [
                        "label" => '<i class="icon-package"></i> Товары',
                        'url' => Url::to(['/product/product/index']),
                        'active' => strpos($_SERVER['REQUEST_URI'],"/product/index") !== false,
                        'options' => ['class' => 'nav-item']
                    ],

                    [
                        "label" => '<i class="icon-list"></i> Компании',
                        'url' => Url::to(['/company/company/index']),
                        'active' => strpos($_SERVER['REQUEST_URI'],"/company/company/index") !== false,
                        'options' => ['class' => 'nav-item']
                    ],
                    [
                        "label" => '<i class="icon-newspaper"></i> Новости',
                        'url' => Url::to(['/post/index']),
                        'active' => strpos($_SERVER['REQUEST_URI'],"/post/index") !== false,
                        'options' => ['class' => 'nav-item']
                    ],
                    [
                        "label" => '<i class="icon-list"></i> Слайдер',
                        'url' => Url::to(['/main-slide/index']),
                        'active' => strpos($_SERVER['REQUEST_URI'],"/main-slide/index") !== false,
                        'options' => ['class' => 'nav-item']
                    ],
                ];

                if(Yii::$app->user->identity['cat'] == 1){
                    $item = [
                        "label" => '<i class="icon-users"></i> Сотрудники',
                        'url' => Url::to(['/admin/index']),
                        'active' => strpos($_SERVER['REQUEST_URI'],"/admin/index") !== false,
                        'options' => ['class' => 'nav-item']
                    ];

                    array_push($items,$item);
                    $item = [
                        "label" => '<i class="icon-user-lock"></i> Доступ',
                        'url' => Url::to(['/admin/rbac']),
                        'active' => strpos($_SERVER['REQUEST_URI'],"/admin/rbac") !== false,
                        'options' => ['class' => 'nav-item']
                    ];

                    array_push($items,$item);
                }

                echo \yii\widgets\Menu::widget([
                    'encodeLabels' => false,
//            'activeCssClass' => 'active',
                    'items' => $items,
                    'linkTemplate' => '<a href="{url}" class="nav-link">{label}</a>',
                    'submenuTemplate' => "\n<ul class='nav nav-group-sub'>\n{items}\n</ul>\n",
                    'options' => [
                        'class' => 'nav nav-sidebar',
                        'data' => ["nav-type" => "accordion"]
                    ]
                ]);
                ?>
            </div>
            <!-- /main navigation -->

        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="card">
            <div class="card-body">
                <?= $content ?>
            </div>
        </div>
    </div>
    <!-- /main content -->

</div>
<!-- /page content -->



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
