<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\UserGroup */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'User Group',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-group-update">

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
                            }
                        }
                    };


                    var t = $("#tree");
                    var zNodes =<?php echo $allGroup; ?>

                        t = $.fn.zTree.init(t, setting, zNodes);
                    var zTree = $.fn.zTree.getZTreeObj("tree");
                    <?php
                    echo "zTree.selectNode(zTree.getNodeByParam(\"id\", ".$model->id."));";
                    ?>
                });
            </script>
            <?php \backend\widgets\JsBlock::end()?>
            <?php
            $this->registerCssFile(yii\helpers\Url::base()."/css/zTreeStyle.css", [],View::POS_HEAD, 'css-print-theme');
            ?>
        </div>
        <div class="col-md-9 col-md-offset-3">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
        </div>
    </div>
</div>
