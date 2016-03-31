<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\widgets\ZTreeWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contents');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>
    <div class="row">
        <div class="col-md-3 tree_left">
            <?= ZTreeWidget::widget(['treeData' => $allNodes,'selectID'=>$node==null?1:$node->id]) ?>
        </div>
        <div class="col-md-9 col-md-offset-3">
            <?=\backend\libtool\ModelError::generateErrors(\backend\services\error\FlashError::getFlashError())?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Content'), ['create','nodeid'=>$node==null?1:$node->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title',
            'editor_name',
            // 'node_id',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            // 'updated_at',
             'status',

            ['class' => 'yii\grid\ActionColumn','header'=>Yii::t('app', 'Operate'),'template' => '{checking/check} {view} {update} {delete}',
                'buttons' => [
                    'checking/check' => function ($url, $model, $key) {
                        return  Html::a('<span class="glyphicon glyphicon-check"></span>', \yii\helpers\Url::to('/checking/check?type=beforeSendCheck&cid='.$model->id) , ['title' => Yii::t('app', 'Send To Check')] ) ;
                    },
                ],
            ],
        ],
    ]); ?>

        </div>
    </div>
</div>
