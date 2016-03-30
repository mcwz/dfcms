<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserManage */

$this->title = Yii::t('app', 'Add children to a role:').$model->role->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Role Manages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-manage-view">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <table class="table">
            <tr>
              <th scope="row"><?=Yii::t('app', 'RoleName')?></th>
              <td><?=$model->role->name?></td>
            </tr>
            <tr>
              <th scope="row"><?=Yii::t('app', 'All Permissions')?></th>
              <td>
                  <?php
                   //echo $form->field($model, 'assignments')->checkboxList($allRoles);
                   echo $form->field($model, 'childItems')->checkboxList(ArrayHelper::map($allPermissions,'name', 'description'));
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
