<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ZTreeWidget;
use backend\libtool\ModelError;
/* @var $this yii\web\View */
/* @var $model backend\models\Nodes */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nodes-view">
    <div class="row">
        <div class="col-md-3 tree_left">
            <?= ZTreeWidget::widget(['treeData' => $allNodes,'selectID'=>$model->id]) ?>
        </div>
        <div class="col-md-9 col-md-offset-3">
            <div class="page-title">
                <span class="title"><?= Html::encode($this->title) ?></span>
            </div>
            <?=ModelError::generateErrors(\backend\services\error\FlashError::getFlashError()); ?>
    <p>
        <?= Html::a(Yii::t('app', 'Create Nodes'), ['create','pid'=>$model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id,'deletefrom'=>'view'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Assign Groups'), ['assign-groups','id'=>$model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Assign Attr Group'), ['assign-attr-group','id'=>$model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pid',
            'name',
            'description',
            'pos',
            ['attribute'=>'type','value'=> \backend\models\Nodes::generateType($model->type)],
            ['attribute'=>'attr_group_id','value'=>\backend\models\AttrGroup::getAttrGroupNameById($model->attr_group_id),],
            ['attribute'=>'check_group_id','value'=>\backend\models\CheckGroup::getCheckGroupNameById($model->check_group_id)],
            'path',
            'status',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
        ],
    ]) ?>

</div>
</div>
    </div>