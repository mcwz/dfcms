<?php

use yii\helpers\Html;
use backend\widgets\ZTreeWidget;
use backend\libtool\ModelError;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Category',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="category-update">

    <div class="row">
        <div class="col-md-3 tree_left">
            <?= ZTreeWidget::widget(['treeData' => json_encode($allCategory),'selectID'=>$model->id]) ?>
        </div>
        <div class="col-md-9 col-md-offset-3">
            <?=ModelError::generateErrors($model->getErrors()); ?>
            <div class="page-title">
                <span class="title"><?= Html::encode($this->title) ?></span>
            </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

        </div>
    </div>
</div>
