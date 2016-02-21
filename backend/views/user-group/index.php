<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User Groups');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="user-group-index">

    <div class="row">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="row">
    <div class="col-md-3 tree_left">
    <ul id="tree" class="ztree" style="width:260px; overflow:auto;"></ul>
        <?php  $this->registerJsFile(yii\helpers\Url::base().'/js/jquery.ztree.all.min.js', ['depends' => [yii\web\JqueryAsset::className()]]);?>
    <?php \backend\widgets\JsBlock::begin() ?>
    <script >
        $(function(){

            var setting = {
                view: {
                    dblClickExpand: false,
                    showLine: true,
                    selectedMulti: false
                },
                data: {
                    simpleData: {
                        enable:true,
                        idKey: "id",
                        pIdKey: "pid",
                        rootPId: ""
                    }
                },
                callback: {
                    beforeClick: function(treeId, treeNode) {
                        var zTree = $.fn.zTree.getZTreeObj("tree");
//                        if (treeNode.isParent) {
//                            zTree.expandNode(treeNode);
//                            return false;
//                        } else {
//                            demoIframe.attr("src",treeNode.file + ".html");
//                            return true;
//                        }
                    }
                }
            };


            var t = $("#tree");
            var zNodes =<?php echo $allGroup; ?>

            t = $.fn.zTree.init(t, setting, zNodes);
            var zTree = $.fn.zTree.getZTreeObj("tree");
        });
    </script>
    <?php \backend\widgets\JsBlock::end()?>
    <?php
    $this->registerCssFile(yii\helpers\Url::base()."/css/zTreeStyle.css", [],View::POS_HEAD, 'css-print-theme');
    ?>
    </div>
        <div class="col-md-9 col-md-offset-3">


    <p>
        <?= Html::a(Yii::t('app', 'Create User Group'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'description',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            'pos',
            'path',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
            </div>
    </div>
</div>
