<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/animate.css',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/main.css',
        'css/prettyPhoto.css',
        'css/price-range.css',
        'css/responsive.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/contact.js',
        'js/gmaps.js',
        'js/html5shiv.js',
        'js/jquery.js',
        'js/jquery.prettyPhoto.js',
        'js/jquery.scrollUp.min.js',
        'js/main.js',
        'js/price-range.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
