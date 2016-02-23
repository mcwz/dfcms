<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\models\UserGroup */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-group-view">
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
            <?php
            if($message!='') {
                ?>
                <div class="row">
                    <div class="alert-danger bg-warning"><?php echo Yii::t('app','HaveChild'); ?></div>
                </div>
                <?php
            }
            ?>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pid',
            'path',
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
        ],
    ]) ?>
        </div>
</div>

</div>
