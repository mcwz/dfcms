<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Auth Item',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auth Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="auth-item-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
