<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserManageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User Manages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-manage-index">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User Manage'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email',
            [
                'attribute' => 'status',
                'filter' => Html::activeDropDownList($searchModel, 'status', \backend\models\UserManage::getSearchStatus(), ['class' => 'form-control']),
                'value'=> function($model){
                    if($model->status==10)
                    {
                        return Yii::t('app', 'STATUS_ACTIVE');
                    }
                    else
                    {
                        return Yii::t('app', 'STATUS_DELETED');
                    }
                }
            ],
            [
                'attribute' => 'created_at',
                'value'=> function($model){
                    return  date('Y-m-d H:i:s',$model->created_at);
                }
            ],
            [
                'attribute' => 'updated_at',
                'value'=>
                function($model){
                    return  date('Y-m-d H:i:s',$model->updated_at);
                },
                //'headerOptions' => ['width' => '170'],
            ],

            ['class' => 'yii\grid\ActionColumn','header'=>Yii::t('app', 'Operate'),'template' => '{authorize} {view} {update} {delete}',
                'buttons' => [
                'authorize' => function ($url, $model, $key) {
                      return  Html::a('<span class="glyphicon glyphicon-lock"></span>', $url, ['title' => Yii::t('app', 'Authorize')] ) ;
                     },
                ],
               //'headerOptions' => ['width' => '180']
            ],
        ],
    ]); ?>

</div>
