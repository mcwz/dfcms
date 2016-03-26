<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Check Groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-group-index">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>

    <p>
        <?= Html::a(Yii::t('app', 'Create Check Group'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'step_count',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            ['class' => 'yii\grid\ActionColumn','header'=>Yii::t('app', 'Operate'),'template' => '{check-step/create} {view} {update} {delete}',
                'buttons' => [
                    'check-step/create' => function ($url, $model, $key) {
                        return  Html::a('<span class="glyphicon glyphicon-list"></span>', \yii\helpers\Url::to('/check-step/create?gid='.$model->id) , ['title' => Yii::t('app', 'Add Step')] ) ;
                    },
                ],
                //'headerOptions' => ['width' => '180']
            ],
        ],
    ]); ?>

</div>
