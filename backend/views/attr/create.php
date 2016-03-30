<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Attrs */

$this->title = Yii::t('app', 'Create Attrs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attrs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="attrs-create">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
