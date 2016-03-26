<?php

use backend\libtool\ModelError;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CheckStep */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="check-step-form">
    <?=ModelError::generateErrors($model->getErrors()); ?>
    <?=ModelError::generateErrors($users4Check->getErrors()); ?>
    <div class="card">
        <div class="card-body">
            <div class="sub-title"><?=Yii::t('app','Check Group To Add');?></div>
            <?= DetailView::widget([
                'model' => $checkGroup,
                'attributes' => [
                    'name',
                    'step_count',
                ],
            ]) ?>
            <?php
            if($existSteps!==null && count($existSteps)>0)
            {
                $step=0;
                echo '<table class="table table-bordered"><tr><td>';
                foreach ($existSteps as $existStep) {
                    if($step==0)
                    {
                        echo Yii::t('app','Step {stepNum}(Check Type-{checkType}):',['stepNum'=>$existStep['step'],'checkType'=>\backend\models\CheckStep::getLabel($existStep['type'])]);
                        $step=$existStep['step'];
                    }
                    elseif($step!=$existStep['step'])
                    {
                        echo '<hr/>'.Yii::t('app','Step {stepNum}(Check Type-{checkType}):',['stepNum'=>$existStep['step'],'checkType'=>\backend\models\CheckStep::getLabel($existStep['type'])]);
                        $step=$existStep['step'];
                    }
                    echo '<span class="one_check_user">'.$existStep['username'].'</span>';
                }
                echo '</td></tr></table>';
            }
            ?>
            <?php $form = ActiveForm::begin(); ?>
            <div class="sub-title"><?=Yii::t('app','Check Step title');?></div>
            <div class="row">
                <?= $form->field($model, 'group_id')->label(false)->hiddenInput(['value' => $checkGroup->id]) ?>
                <?= $form->field($model, 'type',['options'=>['class'=>'col-sm-4']])->dropDownList(\backend\models\CheckStep::getCheckTypes()) ?>
            </div>
            <div class="row">
                <?php
                $users=\backend\models\User::getUsers();
                echo $form->field($users4Check, 'userIds',['options'=>['class'=>'col-sm-4']])->checkboxList($users);
                ?>
            </div>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>



</div>
