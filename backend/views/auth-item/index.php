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
                    if($model->type==1)
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
