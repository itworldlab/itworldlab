<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css',
        'css/select2.min.css',
        'css/main.min.css',
        'plugins/swiper/swiper.css',
        'css/custom.css',
    ];
    public $js = [
//        "https://code.jquery.com/jquery-2.2.4.min.js",
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js',
        "js/jquery.fancybox.min.js",
        "js/select2.min.js",
        "js/app.min.js",

    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap4\BootstrapPluginAsset',
    ];

    public $jsOptions = [
//        'position' => View::POS_HEAD
    ];
}
