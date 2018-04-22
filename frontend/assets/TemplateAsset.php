<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TemplateAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assetTemplate/bootstrap/css/bootstrap.min.css',
        'assetTemplate/metisMenu/metisMenu.min.css',
        'assetTemplate/css/sb-admin-2.css',
        'assetTemplate/morrisjs/morris.css',
        'assetTemplate/font-awesome/css/font-awesome.min.css',
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
        // 'assetTemplate/jquery/jquery.min.js',
        'assetTemplate/bootstrap/js/bootstrap.min.js',
        'assetTemplate/metisMenu/metisMenu.min.js',
        'assetTemplate/raphael/raphael.min.js',
        'assetTemplate/morrisjs/morris.min.js',
        'assetTemplate/morrisjs/morris.min.js',
        'assetTemplate/js/sb-admin-2.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
