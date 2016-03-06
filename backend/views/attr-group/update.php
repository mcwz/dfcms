<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AttrGroup */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Attr Group',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attr Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="attr-group-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
