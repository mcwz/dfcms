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
                echo '<table class="table table-bordered">';
                $i=1;
                foreach ($existSteps as $existStep) {
                    if($step!=$existStep['step'])
                    {
                        if($step==0)echo "<tr><td style=\"width:240px;\">";
                        else echo "</td></tr><tr><td><button title='".Yii::t('app','Delete This Step')."' check_step_id=\"".$existStep['id']."\" type=\"button\" class=\"onestep close\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                        echo Yii::t('app','Step {stepNum}(Check Type-{checkType}):',['stepNum'=>$i++,'checkType'=>\backend\models\CheckStep::getLabel($existStep['type'])]);

                        echo "</td><td>";
                        echo '<a href="javascript:;" title="'.Yii::t('app','Add User').'" class ="add_user_to_step btn btn-default" step_id="'.$existStep['id'].'"><span class="
glyphicon glyphicon-plus"></span></a>';
                        $step=$existStep['step'];
                    }
                    if($existStep['check_step_user_id'])
                        echo '<a class="one_check_user btn  btn-default">'.$existStep['username'].'<button check_step_user_id="'.$existStep['check_step_user_id'].'" type="button" class="onecheckuserdel close" aria-label="Close"><span aria-hidden="true">&times;</span></button></a>';
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


<div class="userlist4add" style="display: none">
    <input type="text" style="display: none" class="hidden_userlist4add_gid" value="<?=$checkGroup->id ?>">
    <input type="text" style="display: none" class="hidden_userlist4add_sid" value="0">
    <?php
//    echo $form->field($users4Check, 'userIds',['options'=>['class'=>'col-sm-4']])->checkboxList($users);
    foreach($users as $userId=>$username)
    {
        echo '<label for="user_checkbox_list_'.$userId.'"><input type="checkbox" id="user_checkbox_list_'.$userId.'" name="input_userlist4add[]" class="input_userlist4add" value="'.$userId.'" />'.$username.'</label>';
    }
    echo '<button type="button" class="btn_addusers btn btn-primary">'.Yii::t('app','Add Users').'</button>';
    ?>

</div>

<?php
backend\widgets\JsBlock::begin();
?>
<script type="text/javascript">
    $(function () {
        //点击删除某一步骤中的单个用户
        $('.onecheckuserdel').on('click',function(){
            var oneCheckUser=$(this);
            var check_step_user_id=oneCheckUser.attr("check_step_user_id");
            if(confirm("<?=Yii::t('app', 'Are you sure you want to delete this item?')?>")) {
                $.post("<?=\yii\helpers\Url::to('/check-step/delete-a-check-step-user')?>", {"id": check_step_user_id}, function (data) {
                    if (data) {
                        data = parseInt(data);
                        if (data > 0) {
                            oneCheckUser.parent().remove();
                        }
                    }
                });
            }
        });

        //点击某一步中的加号用于增加审核用户
        $(".add_user_to_step").on('click',function(){
            var clickThis=$(this);
            var userlist4add=$(".userlist4add");
            var step_id=clickThis.attr('step_id');
            clickThis.after(userlist4add);
            $(".hidden_userlist4add_sid").val(step_id);
            userlist4add.slideDown();
        });

        //在某一步骤中确认增加用户而点击的按钮
        $(".btn_addusers").on('click',function(){
            var selectedUserObj=$(".input_userlist4add:checked");
            var userlist4add=$(".userlist4add");

            var hidden_userlist4add_gid=$(".hidden_userlist4add_gid");
            var hidden_userlist4add_sid=$(".hidden_userlist4add_sid");
            var userIdStr="";
            $.each(selectedUserObj,function(i,n){
                if(userIdStr=="") userIdStr=$(n).val();
                else userIdStr=","+$(n).val();
            });

            if(hidden_userlist4add_gid.val()>0 && hidden_userlist4add_sid.val()>0 && userIdStr!="")
            {
                $.post("<?=\yii\helpers\Url::to('/check-step/add-users-check-step')?>",
                    {"hidden_userlist4add_gid":hidden_userlist4add_gid.val(),"hidden_userlist4add_sid":hidden_userlist4add_sid.val(),"userIdStr":userIdStr},
                    function(data){
                        data=parseInt(data);
                        if(data>0)
                        {
                            window.location.reload();
                        }
                    });
            }

        });//click end


        $(".onestep").on('click',function(){
            var clickThis=$(this);
            var stepId=clickThis.attr("check_step_id");
            if(confirm("<?=Yii::t('app', 'Are you sure you want to delete this item?')?>\r\n<?=Yii::t('app','If delete this,all the users in this step will delete too(not delete user).')?>"))
            {
                $.post("<?=\yii\helpers\Url::to('/check-step/delete-step')?>",
                    {"stepId":stepId},
                    function(data){
                        data=parseInt(data);
                        if(data>0)
                        {
                            window.location.reload();
                        }
                    });
            }
        });
    });
</script>
<?php
backend\widgets\JsBlock::end();
?>
