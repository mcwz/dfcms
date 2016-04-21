<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\widgets\Ueditor;
use backend\services\activeAttr\ActiveAttrFormFactory;
use backend\libtool\ModelError;

/* @var $this yii\web\View */
/* @var $model backend\models\Content */
/* @var $contentAttrModel backend\models\Attrs */
/* @var $activeAttrModel backend\models\forms\AttrActiveModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">

    <?=ModelError::generateErrors($model->getErrors()); ?>
    <?=ModelError::generateErrors($contentAttrModel->getErrors()); ?>
    <?=ModelError::generateErrors($activeAttrModel->getErrors()); ?>
    <?=ModelError::generateErrors($urlModel->getErrors()); ?>
    <?php $form = ActiveForm::begin(); ?>



    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <?php
            if ($check !== false) {
                ?>
                <li role="presentation" class="active"><a href="#check" aria-controls="check" role="tab"
                                                          data-toggle="tab"
                                                          aria-expanded="true"><?= Yii::t('app', 'Content Check Tab') ?></a>
                </li>
                <?php
            }
            ?>
            <li role="presentation" <?php if ($check === false) echo 'class="active"'; ?> ><a href="#home"
                                                                                              aria-controls="home"
                                                                                              role="tab"
                                                                                              data-toggle="tab"
                                                                                              aria-expanded="true"><?= Yii::t('app', 'Content Base Tab') ?></a>
            </li>
            <li role="presentation" class=""><a href="#attr" aria-controls="attr" role="tab" data-toggle="tab" aria-expanded="false"><?=Yii::t('app','Content Attr Tab')?></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane <?php if ($check !== false) {
                echo 'active';
            } ?>" id="check">
                <div class="row">
                    <table class="table table-bordered">
                        <tr>
                            <th class="col_title200"><?= Yii::t('app', 'Content Title') ?></th>
                            <td><?= $model->title ?></td>
                        </tr>
                    </table>
                    <table class="table table-bordered">

                        <?php
                        $step = 0;
                        /** @var array $checkStepUsersModels */
                        $checkStepUsersModels = $check['checkStepUsersModels'];
                        $checkingStatus = $check['checkingStatus'];

                        $checkStepUsersModelCount = count($checkStepUsersModels);
                        for ($i = 0; $i < $checkStepUsersModelCount; $i++) {
                            if ($checkStepUsersModels[$i]['step'] != $step) {
                                echo '<tr><th  class="col_title200">' . Yii::t('app', 'Step {stepNum}(Check Type-{checkType}):',
                                        ['stepNum' => $checkStepUsersModels[$i]['step'], 'checkType' => \backend\models\CheckStep::getLabel($checkStepUsersModels[$i]['type'])]) . '</th><td>';
                            }

                            //以下10行是显示每个审核人以及审核状态
                            echo '<span class="one_check_user ';
                            if (isset($checkingStatus['checkStep_' . $checkStepUsersModels[$i]['check_step_id']]['userId_' . $checkStepUsersModels[$i]['user_id']])) {
                                $checkStatus = $checkingStatus['checkStep_' . $checkStepUsersModels[$i]['check_step_id']]['userId_' . $checkStepUsersModels[$i]['user_id']];
                                if ($checkStatus == 1)
                                    echo 'glyphicon glyphicon-ok"  title="' . Yii::t('app', 'Already Checked') . '"';
                                else
                                    echo '"';
                            } else {
                                echo '"';
                            }
                            echo ' >' . $checkStepUsersModels[$i]['username'] . '</span>';

                            $step = $checkStepUsersModels[$i]['step'];
                            if (($i + 1) < $checkStepUsersModelCount && $checkStepUsersModels[$i + 1]['step'] != $step) {
                                echo '</td></tr>';
                            }

                        }

                        ?>
                    </table>

                    <p>
                        <?= Html::a(Yii::t('app', 'Send To Check'), ['/checking/check', 'cid' => $model->id, 'categoryid' => $model->node_id], ['class' => 'btn btn-primary']) ?>
                    </p>

                </div>
            </div>
            <div role="tabpanel" class="tab-pane <?php if ($check === false) {
                echo 'active';
            } ?>" id="home">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

                <?php
                echo $form->field($contentAttrModel, 'content')->widget(Ueditor::className(),[
                    'options'=>[
                        'id'=>'content',
                        'toolbars'=> [
                            [
                                'undo', //撤销
                                'redo', //重做
                                'bold', //加粗
                                'italic', //斜体
                                'source', //源代码
                                'pasteplain', //纯文本粘贴模式
                                'removeformat', //清除格式
                                'unlink', //取消链接
                                'fontfamily', //字体
                                'fontsize', //字号
                                'simpleupload', //单图上传
                                'insertimage', //多图上传
                                'link', //超链接
                                'searchreplace', //查询替换
                                'insertvideo', //视频
                                'justifyleft', //居左对齐
                                'justifyright', //居右对齐
                                'justifycenter', //居中对齐
                                'justifyjustify', //两端对齐
                                'forecolor', //字体颜色
                                'fullscreen', //全屏
                                'pagebreak', //分页
                                'imagenone', //默认
                                'imageleft', //左浮动
                                'imageright', //右浮动
                                'attachment', //附件
                                'imagecenter', //居中
                                'autotypeset', //自动排版
                                'inserttable', //插入表格
                            ]
                        ],
                    ],
                    'attributes'=>[
                        'style'=>'height:500px'
                    ]
                ])
                ?>

                <?= $form->field($urlModel, 'url')->textInput(['maxlength' => true,'readonly'=>true]) ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="attr">
                <?php
                //$attr_array
                $form_generate=ActiveAttrFormFactory::build($form,$attr_array);
                foreach($form_generate as $oneAttr)
                {
                    echo $oneAttr;
                }
                ?>
            </div>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update Content'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
