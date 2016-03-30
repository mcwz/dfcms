<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Attrs */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Attrs',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attrs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="attrs-update">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
