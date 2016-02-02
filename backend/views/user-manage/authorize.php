<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserManage */

$this->title = Yii::t('app', 'Authorize To:').$model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Manages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-manage-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <table class="table">
            <tr>
              <th scope="row"><?=Yii::t('app', 'Username')?></th>
              <td><?=$model->username?></td>
            </tr>
            <tr>
              <th scope="row"><?=Yii::t('app', 'Roles Assign')?></th>
              <td>
                  到这里啦
              </td>
            </tr>
            </table>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
