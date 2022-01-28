<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900',
        'plugins/icomoon/styles.min.css',
        'plugins/croppie/croppie.css',
        'css/bootstrap_limitless.min.css',
        'css/layout.min.css',
        'css/components.min.css',
        'css/colors.min.css',
        'css/custom2.css',
    ];
    public $js = [
        "js/bootstrap.bundle.min.js",
        "plugins/blockui.min.js",
        "plugins/jgrowl.min.js",
        "plugins/noty.min.js",
//        "plugins/cropper/cropper.min.js",
//        "plugins/cropper/extension_image_cropper.js",
//        "plugins/switchery.min.js",
        'plugins/croppie/croppie.min.js',
        "js/app.js",
        "js/custom.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap4\BootstrapPluginAsset',
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}
