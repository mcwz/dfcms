<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Nodes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nodes-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    <?= $form->field($model, 'name',['options'=>['class'=>'col-sm-4']])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="row">
        <div class="col-sm-4 field-nodes-pid">
            <label class="control-label">父级名称:</label>
            <?=$pModel->name?><?= $form->field($model, 'pid')->hiddenInput()->label(false) ?>
        </div>
    </div>
    <div class="row">
    <?= $form->field($model, 'description',['options'=>['class'=>'col-sm-6']])->textInput(['maxlength' => true]) ?>
    </div>

    <div class="row">
    <?= $form->field($model, 'type',['options'=>['class'=>'col-sm-2']])->dropDownList(\backend\models\Nodes::getType()) ?>
    </div>

    <div class="row">
    <?= $form->field($model, 'path',['options'=>['class'=>'col-sm-4']])->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
