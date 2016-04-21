<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\widgets\ZTreeWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $category backend\models\Category */

$this->title = Yii::t('app', 'Contents');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>
    <div class="row">
        <div class="col-md-3 tree_left">
            <?=
            ZTreeWidget::widget(['treeData' => $allNodes, 'selectID' => $category == null ? 1 : $category->id]) ?>
        </div>
        <div class="col-md-9 col-md-offset-3">
            <?=\backend\libtool\ModelError::generateErrors(\backend\services\error\FlashError::getFlashError())?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Content'), ['create', 'nodeid' => $category == null ? 1 : $category->id], ['class' => 'btn btn-success']) ?>
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

            [
                'attribute' => 'status',
                'filter' => Html::activeDropDownList($searchModel, 'status', \backend\models\Content::getSearchStatus(), ['class' => 'form-control']),
                'value' => function ($model) {
                    return \backend\models\Content::getStatusStr($model->status);
                }
            ],

            ['class' => 'yii\grid\ActionColumn','header'=>Yii::t('app', 'Operate'),'template' => '{checking/check} {view} {update} {delete}',
                'buttons' => [
                    'checking/check' => function ($url, $model, $key) {
                        if ($model->status == \backend\models\Content::STATUS_EDITING) {
                            $type = 'type=beforeSendCheck&';
                        } else {
                            $type = '';
                        }
                        return Html::a('<span class="glyphicon glyphicon-check"></span>', \yii\helpers\Url::to('/content/update?id=' . $model->id . '&isCheck=2'), ['title' => Yii::t('app', 'Send To Check')]);
                    },
                ],
            ],
        ],
    ]); ?>

        </div>
    </div>
</div>
