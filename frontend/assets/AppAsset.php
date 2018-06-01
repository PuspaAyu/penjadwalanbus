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
        // 'css/custom.min.css',
        // 'css/nprogress.css'
    ];
    public $js = [
        // 'jquery/nprogress.js',
        // 'jquery/jQuery-Smart-Wizard/js/jquery.smartWizard.js',
        // 'jquery/jquery.min.js',
        // 'jquery/custom.min.js',
        // 'jquery/fastclick.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
