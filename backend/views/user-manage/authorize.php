<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserManage */

$this->title = Yii::t('app', 'Authorize To:').$model->user->username;
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
              <td><?=$model->user->username?></td>
            </tr>
            <tr>
              <th scope="row"><?=Yii::t('app', 'Roles Assign')?></th>
              <td>
                  <?php
                   //echo $form->field($model, 'assignments')->checkboxList($allRoles);
                   echo $form->field($model, 'assignments')->checkboxList(ArrayHelper::map($allRoles,'name', 'description'));
                    ?>
                  
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
