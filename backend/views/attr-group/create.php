<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AttrGroup */

$this->title = Yii::t('app', 'Create Attr Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attr Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attr-group-create">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
