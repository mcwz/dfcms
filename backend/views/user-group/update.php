<?php

use yii\helpers\Html;
use backend\widgets\ZTreeWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\UserGroup */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'User Group',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-group-update">

    <div class="row">
        <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="row">
        <div class="col-md-3 tree_left">
            <?= ZTreeWidget::widget(['treeData' => $allGroup,'selectID'=>$model->id]) ?>
        </div>
        <div class="col-md-9 col-md-offset-3">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
        </div>
    </div>
</div>
