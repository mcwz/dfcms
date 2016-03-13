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
    <?php $form = ActiveForm::begin(); ?>



    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><?=Yii::t('app','Content Base Tab')?></a></li>
            <li role="presentation" class=""><a href="#attr" aria-controls="attr" role="tab" data-toggle="tab" aria-expanded="false"><?=Yii::t('app','Content Attr Tab')?></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
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
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
