<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ZTreeWidget;
use \backend\widgets\JsBlock;
/* @var $this yii\web\View */
/* @var $model backend\models\Nodes */
/** @var array $allNodes */
/** @var mixed $nodeModel */
$this->title = Yii::t('app', 'Assign Groups');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nodes-view">
    <div class="row">
        <div class="col-md-3 tree_left">
            <?= ZTreeWidget::widget(['treeData' => $allNodes,'selectID'=>$nodeModel->id]) ?>
        </div>
        <div class="col-md-9 col-md-offset-3">
            <?= Html::beginForm('', 'post',['id'=>'node_set_group']) ?>
            <?= Html::hiddenInput('AssignNodesGroupForm[nodeId]',$model->nodeId)?>
            <table class="table">
                <tr>
                    <th colspan="2"><h3><?= Html::encode($this->title) ?></h3></th>
                </tr>
                <tr>
                    <th><?=Yii::t('app','Selected Node');?></th>
                    <td><?=$nodeModel->name?></td>
                </tr>
                <tr>
                    <th><?=Yii::t('app','Choose Group');?></th>
                    <td><?=ZTreeWidget::widget(['treeData' => $allGroups,'expandAll'=>true,'treeName'=>'groupTree','isForm'=>true])?></td>
                </tr>
                <tr>
                    <td colspan="2"><?= Html::button(Yii::t('app', 'Save'), ['class' => 'btn btn-primary','onclick'=>'return checkAndSubmit()']) ?></td>
                </tr>
            </table>
            <?= Html::endForm() ?>
        </div>
        <?php JsBlock::begin();?>
        <script type="text/javascript">
            function checkAndSubmit()
            {
                var treeObj = $.fn.zTree.getZTreeObj("groupTree");
                var nodes = treeObj.getCheckedNodes();
                var groupsInputStr='';
                for(i=0;i<nodes.length;i++)
                {
                    groupsInputStr+="<input type='hidden' name='AssignNodesGroupForm[groupsId][]' value='"+nodes[i].id+"' />";
                }
                $("#node_set_group").append(groupsInputStr).submit();
            }
        </script>
        <?php JsBlock::end();?>
    </div>
</div>