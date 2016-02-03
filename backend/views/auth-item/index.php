<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Auth Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Auth Item'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'type',
                'filter' => Html::activeDropDownList($searchModel, 'type', \backend\models\AuthItem::getSearchStatus(), ['class' => 'form-control']),
                'value'=> function($model){
                    if($model->type==$model::AUTH_ITEM_ROLE)
                    {
                        return Yii::t('app', 'AUTH_ITEM_ROLE');
                    }
                    else
                    {
                        return Yii::t('app', 'AUTH_ITEM_MODULE');
                    }
                }
            ],
            'description:ntext',
            'rule_name',
            'data:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn','header'=>Yii::t('app', 'Operate'),'template' => ' {view} {update} {delete} {add-child}',
                'buttons' => [
                'add-child' => function ($url, $model, $key) {
                        if($model->type==$model::AUTH_ITEM_ROLE){
                            return  Html::a('<span class="glyphicon glyphicon-lock"></span>', $url, ['title' => Yii::t('app', 'Add Child To Role')] ) ;
                        }
                        else
                        {
                            return ;
                        }
                      
                     },
                ],
               //'headerOptions' => ['width' => '180']
            ],
        ],
    ]); ?>

</div>
