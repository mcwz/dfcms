<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\ZTreeWidget;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\Nodes */

$this->title = Yii::t('app', 'Nodes Attr Group Assign');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nodes-view">
    <div class="row">
        <div class="col-md-3 tree_left">
            <?= ZTreeWidget::widget(['treeData' => $allNodes,'selectID'=>$node->id]) ?>
        </div>
        <div class="col-md-9 col-md-offset-3">
            <div class="page-title">
                <span class="title"><?= Html::encode($this->title) ?></span>
            </div>

    <?= DetailView::widget([
        'model' => $node,
        'attributes' => [
            'id',
            'name',
            'description',
            'pos',
            'type',
            'attr_group_id',
            'flow_group_id',
            'path',
            'status',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
        ],
    ]) ?>
            <?php $form = ActiveForm::begin(); ?>
            <?php echo Html::hiddenInput ( "NodeAttrGroup[node_id]", $node->id ); ?>
            <table class="table table-bordered">
                <tr>
                    <th><?= Yii::t('app', 'Choose Attr Group')?></th>
                    <td>
                        <?php
                        $checked="";
                        foreach ($attr_group as $ag) {
                            if($ag['id']==$node_attr_group['attr_group_id'])
                                $checked=" checked='checked' ";
                            else
                                $checked="";
                            echo '<label for="attrGroup'.$ag['id'].'"><input '.$checked.' id="attrGroup'.$ag['id'].'" type="radio" name="NodeAttrGroup[attr_group_id]" value="'.$ag['id'].'" />'.$ag['name'].'</label>';
                        }
                        ?>
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