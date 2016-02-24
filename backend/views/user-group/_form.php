<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\libtool\ModelError;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $model backend\models\UserGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-group-form">

    <?php $form = ActiveForm::begin(); ?>
    <?=ModelError::generateErrors($model->getErrors()); ?>
    <div class="row">
    <?= $form->field($model, 'name',['options'=>['class'=>'col-sm-4']])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
    <?= $form->field($model, 'description',['options'=>['class'=>'col-sm-6']])->textInput(['maxlength' => true]) ?>
    </div>
    <?php

    if(isset($pModel) && $pModel!=null)
    {
        ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'pid')->hiddenInput() ?>
        <?php
            echo $pModel->name;
        ?>
        </div>
    </div>
    <?php
    }
    else
    {
    echo $form->field($model, 'pid')->hiddenInput()->label(false);
    }
    ?>
    <div class="row">
    <?= $form->field($model, 'pos',['options'=>['class'=>'col-sm-1']])->textInput() ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
