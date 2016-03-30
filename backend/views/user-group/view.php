<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\View;
use backend\widgets\ZTreeWidget;

/* @var $this yii\web\View */
/** @var  $allGroup */
/* @var $model backend\models\UserGroup */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-group-view">
    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>
    <div class="row">
        <div class="col-md-3 tree_left">
            <?=ZTreeWidget::widget(['treeData' => $allGroup,'selectID'=>$model->id]) ?>
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
        <?= Html::a(Yii::t('app', 'Create User Group'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Create Child User Group'), ['create','pid'=>$model->id], ['class' => 'btn btn-success']) ?>
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
