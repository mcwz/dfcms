<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = Yii::t('app', 'You have not permission to access this page.');
?>
<div class="site-error">

    <h3><?= Html::encode($this->title) ?></h3>

    <div class="alert alert-danger">
        <?=Yii::t('app', 'You have not permission to access this page.') ?>
    </div>

    <p>
        <?=Yii::t('app', 'The above error occurred while the Web server was processing your request.');?>
    </p>
    <p>
<?=Yii::t('app', 'Please contact us if you think this is a server error. Thank you.');?>
    </p>

</div>
