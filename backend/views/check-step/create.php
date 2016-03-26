<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CheckStep */

$this->title = Yii::t('app', 'Create Check Step');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Check Steps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-step-create">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'checkGroup'=>$checkGroup,
        'users4Check'=>$users4Check,
        'existSteps'=>$existSteps,
    ]) ?>

</div>
