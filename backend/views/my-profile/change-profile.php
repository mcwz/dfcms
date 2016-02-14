<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\forms\changeProfileForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="change-profile-form">
	<?php
	if(isset($message))
	{
		echo '<div class="row"><p class="bg-success">'.$message.'</p></div>';
	}
	?>
    <?php $form = ActiveForm::begin(); ?>
	
	<div class="row">
    	<?= $form->field($model, 'password',['options'=>['class'=>'col-sm-4']])->passwordInput(['maxlength' => true]) ?>
	</div>
	<div class="row">
    	<?= $form->field($model, 'newPassword',['options'=>['class'=>'col-sm-4']])->passwordInput(['maxlength' => true]) ?>
	</div>
	<div class="row">
		<?= $form->field($model, 'confirmPassword',['options'=>['class'=>'col-sm-4']])->passwordInput(['maxlength' => true]) ?>
	</div>
	<div class="row">
    	<?= $form->field($model, 'email',['options'=>['class'=>'col-sm-4']])->textInput(['maxlength' => true]) ?>
	</div>
    <div class="form-group">
        <?= Html::submitButton( Yii::t('app', 'Save') , ['class' =>  'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
