<?php

use yii\helpers\Html;
use backend\widgets\ZTreeWidget;
/* @var $this yii\web\View */
/* @var $model backend\models\Nodes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Nodes',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="nodes-update">
    <div class="row">
        <div class="col-md-3 tree_left">
            <?= ZTreeWidget::widget(['treeData' => $allNodes,'selectID'=>$model->id]) ?>
        </div>
        <div class="col-md-9 col-md-offset-3">
    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'pModel'=>$pModel
    ]) ?>

</div>
        </div>
    </div>
