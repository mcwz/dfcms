<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\widgets\ZTreeWidget;
use backend\libtool\ModelError;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\NodesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Nodes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nodes-index">

    <div class="row">
        <div class="col-md-3 tree_left">
            <?= ZTreeWidget::widget(['treeData' => $allNodes,'selectID'=>1]) ?>
        </div>
        <div class="col-md-9 col-md-offset-3">
            <div class="page-title">
                <span class="title"><?= Html::encode($this->title) ?></span>
            </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <?=ModelError::generateErrors(\backend\services\error\FlashError::getFlashError()); ?>
    <p>
        <?= Html::a(Yii::t('app', 'Create Nodes'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pid',
            'name',
            //'description',
            //'pos',
            // 'type',
            // 'attr_group_id',
            // 'flow_group_id',
            // 'path',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
    </div>