<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Attrs */

$this->title = Yii::t('app', 'Create Attrs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attrs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="attrs-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
