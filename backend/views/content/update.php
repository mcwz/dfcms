<?php

use yii\helpers\Html;
use backend\widgets\ZTreeWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\Content */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Content',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="content-update">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>
    <div class="row">
        <div class="col-md-3 tree_left">
            <?= ZTreeWidget::widget(['treeData' => $allNodes,'selectID'=>$node==null?0:$node->id]) ?>
        </div>
        <div class="col-md-9 col-md-offset-3">


    <?= $this->render('_form', [
        'model' => $model,
        'contentAttrModel'=>$contentAttrModel,
        'attr_array'=>$attr_array,
        'activeAttrModel'=>$activeAttrModel,
        'urlModel'=>$urlModel,
    ]) ?>

        </div>
    </div>
</div>
