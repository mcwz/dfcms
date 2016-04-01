<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Content */

$this->title = Yii::t('app', 'Checking Step Users');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Content List'), 'url' => ['/content/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-view">

    <div class="page-title">
        <span class="title"><?= Html::encode($this->title) ?></span>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th class="col_title200"><?=Yii::t('app','Content Title')?></th>
                <td><?=$content->title?></td>
            </tr>
        </table>
        <table class="table table-bordered">

                <?php
                $step=0;
                /** @var array $checkStepUsersModels */
                $checkStepUsersModelCount=count($checkStepUsersModels);
                for($i=0;$i<$checkStepUsersModelCount;$i++)
                {
                    if($checkStepUsersModels[$i]['step']!=$step)
                    {
                        echo '<tr><th  class="col_title200">'.Yii::t('app','Step {stepNum}(Check Type-{checkType}):',
                                ['stepNum'=>$checkStepUsersModels[$i]['step'],'checkType'=>\backend\models\CheckStep::getLabel($checkStepUsersModels[$i]['type'])]).'</th><td>';
                    }

                    echo '<span class="one_check_user">'.$checkStepUsersModels[$i]['username'].'</span>';
                    $step=$checkStepUsersModels[$i]['step'];
                    if(($i+1)<$checkStepUsersModelCount && $checkStepUsersModels[$i+1]['step']!=$step)
                    {
                        echo '</td></tr>';
                    }

                }

                ?>
        </table>

        <p>
            <?= Html::a(Yii::t('app', 'Send To Check'), ['', 'cid' => $content->id, 'categoryid' => $categoryId], ['class' => 'btn btn-primary']) ?>
        </p>

    </div>
</div>

