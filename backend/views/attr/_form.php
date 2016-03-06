<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Attrs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attrs-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <?= $form->field($model, 'name',['options'=>['class'=>'col-sm-4']])->textInput(['maxlength' => true]) ?>
</div>
<div class="row">
    <?= $form->field($model, 'type',['options'=>['class'=>'col-sm-4']])->dropDownList(\backend\models\Attrs::getAttrTypes())  ?>
</div>
<div class="row">
    <?= $form->field($model, 'label',['options'=>['class'=>'col-sm-4']])->textInput(['maxlength' => true]) ?>
</div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
