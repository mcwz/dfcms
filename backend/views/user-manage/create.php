<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserManage */

$this->title = Yii::t('app', 'Create User Manage');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Manages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-manage-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
