<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\YiiAsset;
use yii\bootstrap\BootstrapAsset;

/**
 * Class SBAdmin2Asset
 * @package app\assets
 */
class SBAdmin2Asset extends AssetBundle
{
    public $basePath = '@webroot/sb-admin';
    public $baseUrl = '@web/sb-admin';
    public $css = [
        'vendor/bootstrap/css/bootstrap.min.css',
        'vendor/metisMenu/metisMenu.min.css',
        'dist/css/sb-admin-2.css',
//        'vendor/morrisjs/morris.css',
        'vendor/font-awesome/css/font-awesome.min.css',
    ];
    public $js = [
//        'vendor/jquery/jquery.min.js',
        'vendor/bootstrap/js/bootstrap.min.js',
        'vendor/metisMenu/metisMenu.min.js',
        'vendor/raphael/raphael.min.js',
//        'vendor/morrisjs/morris.js',
//        'data/morris-data.js',
        'dist/js/sb-admin-2.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $sourcePath = '';
    public $jsOptions = [];
    public $cssOptions = [];
    public $publishOptions = [];
}
