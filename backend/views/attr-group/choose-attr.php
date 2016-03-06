<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $attrGroup backend\models\AttrGroup */
/** @var array $all_attr */

$this->title = Yii::t('app', 'Choose Attr');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attr Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attr-group-view">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>

    <?= DetailView::widget([
        'model' => $attrGroup,
        'attributes' => [
            'id',
            'name',
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
    <?php echo Html::hiddenInput ( "AssignAttrGroupForm[groupId]", $attrGroup->id ); ?>
    <table class="table table-bordered table-hover">
        <tr>
            <th>
                <?=Yii::t('app', 'Choose')?>
            </th>
            <th>
                <?=Yii::t('app', 'Attr Name')?>
            </th>
            <th>
                <?=Yii::t('app', 'Attr Label')?>
            </th>
            <th>
                <?=Yii::t('app', 'Attr Type')?>
            </th>
        </tr>
        <?php
        foreach($all_attr as $attr) {
            ?>
            <tr>
                <td>
                    <input <?php if(in_array($attr->id,$now_assign)) echo " checked='checked' "; ?> type="checkbox" name="AssignAttrGroupForm[attrsId][]" value="<?=$attr->id?>" />
                </td>
                <td>
                    <?=$attr->name?>
                </td>
                <td>
                    <?=$attr->label?>
                </td>
                <td>
                    <?=\backend\services\attr\AttrFactory::getThisType($attr->type)?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
