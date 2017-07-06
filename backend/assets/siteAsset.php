<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class siteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',
        'css/bootstrap.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
        'plugins/icheck/flat/blue.css',
    ];
    public $js = [
        // 'https://code.jquery.com/jquery-2.2.4.min.js',
        // 'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
        'dist/js/bootstrap.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'plugins/fastclick/fastclick.js',
        'dist/js/adminlte.min.js',
        'plugins/chartjs/Chart.min.js',
        // 'dist/js/pages/dashboard.js',
        // 'dist/js/demo.js',
        // 'dist/js/jquery-2.2.4.min.js',
        'dist/js/app.min.js',
        //'dist/js/script2.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
