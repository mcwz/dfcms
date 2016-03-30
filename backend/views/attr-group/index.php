<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Attr Groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attr-group-index">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>

    <p>
        <?= Html::a(Yii::t('app', 'Create Attr Group'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],

            ['class' => 'yii\grid\ActionColumn','header'=>Yii::t('app', 'Operate'),'template' => '{choose-attr} {view} {update} {delete}',
                'buttons' => [
                    'choose-attr' => function ($url, $model, $key) {
                        return  Html::a('<span class="glyphicon glyphicon-text-color"></span>', $url, ['title' => Yii::t('app', 'Choose Attr')] ) ;
                    },
                ],
                //'headerOptions' => ['width' => '180']
            ],
        ],
    ]); ?>

</div>
