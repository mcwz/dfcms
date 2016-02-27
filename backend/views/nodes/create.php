<?php

use yii\helpers\Html;
use backend\widgets\ZTreeWidget;
use backend\libtool\ModelError;

/* @var $this yii\web\View */
/* @var $model backend\models\Nodes */

$this->title = Yii::t('app', 'Create Nodes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nodes-create">
    <div class="row">
        <div class="col-md-3 tree_left">
            <?= ZTreeWidget::widget(['treeData' => $allNodes,'selectID'=>$pModel->id]) ?>
        </div>
        <div class="col-md-9 col-md-offset-3">
            <?=ModelError::generateErrors($model->getErrors()); ?>
    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'pModel'=>$pModel,
    ]) ?>

</div>
        </div>
    </div>
