<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\widgets\ZTreeWidget;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User Groups');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="user-group-index">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>
    <div class="row">
    <div class="col-md-3 tree_left">

        <?= ZTreeWidget::widget(['treeData' => $allGroup]) ?>


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
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
            </div>
    </div>
</div>
