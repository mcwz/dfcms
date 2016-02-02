<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserManage */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => Yii::t('app', 'Username'),
]) . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Manages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-manage-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
