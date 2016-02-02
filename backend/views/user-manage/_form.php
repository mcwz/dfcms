<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserManage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-manage-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="row">
    	<?= $form->field($model, 'username',['options'=>['class'=>'col-sm-4']])->textInput(['maxlength' => true,'readonly'=> !$model->isNewRecord]) ?>
	</div>
	<div class="row">
    	<?= $form->field($model, 'password_hash',['options'=>['class'=>'col-sm-4']])->textInput(['maxlength' => true]) ?>
	</div>
	<div class="row">
    	<?= $form->field($model, 'email',['options'=>['class'=>'col-sm-4']])->textInput(['maxlength' => true]) ?>
	</div>
	<div class="row">
    	<?= $form->field($model, 'status',['options'=>['class'=>'col-sm-4']])->dropDownList(\backend\models\UserManage::getStatus())  ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
