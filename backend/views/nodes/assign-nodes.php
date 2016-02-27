<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ZTreeWidget;
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
            <h3><?= Html::encode($this->title) ?></h3>
            <div class="row">
                <?=ZTreeWidget::widget(['treeData' => $allGroups,'expandAll'=>true,'treeName'=>'groupTree'])?>
            </div>
        </div>
    </div>
</div>