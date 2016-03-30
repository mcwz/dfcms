<?php

use yii\helpers\Html;
use backend\widgets\ZTreeWidget;
use backend\libtool\ModelError;


/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = Yii::t('app', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['view?id=1']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">
    <div class="row">
        <div class="col-md-3 tree_left">
            <?= ZTreeWidget::widget(['treeData' => json_encode($allCategory),'selectID'=>$pid]) ?>
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

