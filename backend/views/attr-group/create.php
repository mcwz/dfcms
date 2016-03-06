<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AttrGroup */

$this->title = Yii::t('app', 'Create Attr Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attr Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attr-group-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
