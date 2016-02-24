<?php
use yii\web\View;
$this->registerJsFile(yii\helpers\Url::base().'/js/jquery.ztree.all.min.js', ['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerCssFile(yii\helpers\Url::base()."/css/zTreeStyle.css", [],View::POS_HEAD, 'css-print-theme');
?>
<ul id="tree" class="ztree" style="width:260px; overflow:auto;"></ul>

