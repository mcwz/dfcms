<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = Yii::$app->params['systemName'];
?>
<div class="site-index">

    <div class="body-content">

        <div class="row row-example">
            <div class="col-sm-4">
                <div class="panel fresh-color panel-primary">
                    <div class="panel-heading"><?=Yii::t('app','Stats Information')?></div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge">14</span> <?=Yii::t('app','Total content:')?>
                            </li>
                            <li class="list-group-item">
                                <span class="badge">1</span> <?=Yii::t('app','Today content count:')?>
                            </li>
                            <li class="list-group-item">
                                <span class="badge">2</span> <?=Yii::t('app','The content which I post today:')?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
