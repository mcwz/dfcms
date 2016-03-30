<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserGroup */
/** @var UserGroup $pModel */

$this->title = Yii::t('app', 'Create User Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-group-create">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>

    <?=
    $this->render('_form', [
        'model' => $model,
        'pModel'=>$pModel
    ]) ?>

</div>
