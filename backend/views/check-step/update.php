<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CheckStep */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Check Step',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Check Steps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="check-step-update">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
