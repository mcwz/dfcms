<?php
/**
 * Created by PhpStorm.
 * User: sheldon
 * Date: 2016/3/9
 * Time: 8:17
 */

namespace backend\widgets;


use yii\web\AssetBundle;

class UeditorAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/ueditor.config.js',
        'js/ueditor.all.min.js',
    ];
    public $css = [
    ];
    public function init()
    {
        $this->sourcePath =$_SERVER['DOCUMENT_ROOT']; //设置资源所处的目录
    }
}