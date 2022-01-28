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
//        'css/site.css',
        'css/app.min.css',
        'plugins/swiper/swiper.css',
//        'css/custom2.css',
    ];
    public $js = [
        /*"https://code.jquery.com/jquery-2.2.4.min.js",
        "js/jquery.fancybox.min.js",
        "js/jquery.inputmask.bundle.js",
        "js/select2.min.js",
        ,*/
        "js/app.min.js",

    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap4\BootstrapPluginAsset',
    ];

    public $jsOptions = [
//        'position' => View::POS_HEAD
    ];
}
