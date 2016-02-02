<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
         'lib/css/bootstrap.min.css',
        'lib/css/font-awesome.min.css',
        'lib/css/animate.min.css',
        'lib/css/bootstrap-switch.min.css',
        'lib/css/checkbox3.min.css',
        'lib/css/jquery.dataTables.min.css',
        'lib/css/dataTables.bootstrap.css',
        'lib/css/select2.min.css',
        'css/style.css',
        'css/themes/flat-blue.css',
    ];
    public $js = [
        'lib/js/bootstrap.min.js',
        'lib/js/Chart.min.js',
        'lib/js/bootstrap-switch.min.js',
        'lib/js/jquery.matchHeight-min.js',
        'lib/js/jquery.dataTables.min.js',
        'lib/js/dataTables.bootstrap.min.js',
        'lib/js/select2.full.min.js',
        'lib/js/ace/ace.js',
        'lib/js/ace/mode-html.js',
        'lib/js/ace/theme-github.js',
        'js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
