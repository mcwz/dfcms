<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $nameInputOptions=array('maxlength' => true);
        if(!$model->isNewRecord)
        {
            $nameInputOptions['readonly']=true;
        }
    ?>
    <div class="row">
        <?= $form->field($model, 'name',['options'=>['class'=>'col-sm-4']])->textInput($nameInputOptions) ?>
    </div>

    <div class="row">
    <?php
    if(!$model->isNewRecord)
    {
        echo $form->field($model, 'type',['options'=>['class'=>'col-sm-4']])->textInput(['readonly'=>true]);
    }else{
        echo $form->field($model, 'type',['options'=>['class'=>'col-sm-4']])->dropDownList(\backend\models\AuthItem::getType());    
    }
    ?>
    </div>

    <div class="row">
        <?= $form->field($model, 'description',['options'=>['class'=>'col-sm-8']])->textarea(['rows' => 6]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
