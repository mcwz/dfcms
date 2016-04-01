<?php

use yii\helpers\Html;
use backend\widgets\ZTreeWidget;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/** @var $category \backend\models\Category */
/** @var array $allNodes */
/** @var $checkGroup \backend\models\CheckGroup */

$this->title = Yii::t('app', 'Nodes Attr Group Assign');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nodes-view">
    <div class="row">
        <div class="col-md-3 tree_left">
            <?= ZTreeWidget::widget(['treeData' => $allNodes, 'selectID' => $category->id]) ?>
        </div>
        <div class="col-md-9 col-md-offset-3">
            <div class="page-title">
                <span class="title"><?= Html::encode($this->title) ?></span>
            </div>


            <?php $form = ActiveForm::begin(); ?>
            <?php //echo Html::hiddenInput ( "NodeAttrGroup[node_id]", $category->id ); ?>
            <table class="table table-bordered">
                <tr>
                    <th><?= Yii::t('app', 'Selected Node'); ?></th>
                    <td><?= $category->name ?></td>
                </tr>
                <tr>
                    <th><?= Yii::t('app', 'Choose Check Group') ?></th>
                    <td>

                        <?=
                        $form->field($category, 'check_group_id', ['options' => ['class' => 'col-sm-4']])->radioList($checkGroup) ?>

                    </td>
                </tr>
            </table>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>