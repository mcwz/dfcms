<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CheckGroup */

$this->title = Yii::t('app', 'Create Check Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Check Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-group-create">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
