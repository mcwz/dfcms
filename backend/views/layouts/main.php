<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use yii\helpers\Url;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title.'-'.Yii::$app->params['systemName'].'@'.Yii::$app->params['version']) ?></title>
    <?php $this->head() ?>
</head>
<body class="flat-blue">
<?php $this->beginBody() ?>

<div class="app-container">
        <div class="row content-container">
            <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-expand-toggle">
                            <i class="fa fa-bars icon"></i>
                        </button>
                        <!--<ol class="breadcrumb navbar-breadcrumb">
                            <li class="active">Dashboard</li>
                        </ol>-->
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'options'=>['class'=>'breadcrumb navbar-breadcrumb'],
        ]) ?>
        <?= Alert::widget() ?>
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-th icon"></i>
                        </button>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-times icon"></i>
                        </button>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-comments-o"></i></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li class="title">
                                    Notification <span class="badge pull-right">0</span>
                                </li>
                                <li class="message">
                                    No new notification
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown danger">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-star-half-o"></i> 4</a>
                            <ul class="dropdown-menu danger  animated fadeInDown">
                                <li class="title">
                                    Notification <span class="badge pull-right">4</span>
                                </li>
                                <li>
                                    <ul class="list-group notifications">
                                        <a href="#">
                                            <li class="list-group-item">
                                                <span class="badge">1</span> <i class="fa fa-exclamation-circle icon"></i> new registration
                                            </li>
                                        </a>
                                        <a href="#">
                                            <li class="list-group-item">
                                                <span class="badge success">1</span> <i class="fa fa-check icon"></i> new orders
                                            </li>
                                        </a>
                                        <a href="#">
                                            <li class="list-group-item">
                                                <span class="badge danger">2</span> <i class="fa fa-comments icon"></i> customers messages
                                            </li>
                                        </a>
                                        <a href="#">
                                            <li class="list-group-item message">
                                                view all
                                            </li>
                                        </a>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php
                                if(Yii::$app->user->id!=null)
                                {
                                    echo Yii::$app->user->identity->username;
                                }
                                ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li class="profile-img">
                                    <img src="../img/profile/picjumbo.com_HNCK4153_resize.jpg" class="profile-img">
                                </li>
                                <li>
                                    <div class="profile-info">
                                        <h4 class="username"><?php
                                            if(Yii::$app->user->id!=null)
                                            {
                                                echo Yii::$app->user->identity->username;
                                            }
                                            ?></h4>
                                        <p><?php
                                            if(Yii::$app->user->id!=null)
                                            {
                                                echo Yii::$app->user->identity->email;
                                            }
                                            ?></p>
                                        <div class="btn-group margin-bottom-2x" role="group">

                                            <a href="<?=Url::to('/my-profile/change-profile')?>" class="btn btn-default"><i class="fa fa-user"></i> <?=Yii::t('app','Profile')?></a>
<?php
if (!Yii::$app->user->isGuest) {
    echo "<a data-method=\"post\" href=\"".Url::to('/site/logout')."\" class=\"btn btn-default\"><i class=\"fa fa-sign-out\"></i> ".Yii::t('app', 'Logout')."</a>";
}
?>                                            
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="side-menu sidebar-inverse">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="side-menu-container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">
                                <div class="icon fa fa-archive"></div>
                                <div class="title">CMS</div>
                            </a>
                            <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                                <i class="fa fa-times icon"></i>
                            </button>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href='<?=Url::to("/site/index")?>'>
                                    <span class="icon fa fa-tachometer"></span><span class="title"><?=Yii::t('app', 'MenuDashBoard')?></span>
                                </a>
                            </li>
                            <li class="panel panel-default dropdown">
                                <a data-toggle="collapse" href="#dropdown-element">
                                    <span class="icon fa fa-cogs"></span><span class="title"><?=Yii::t('app', 'MenuSysconfig')?></span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <div id="dropdown-element" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="<?=Url::to("/auth-item/index")?>"><?=Yii::t('app', 'MenuSysModule')?></a>
                                            </li>
                                            <li><a href="<?=Url::to("/user-manage/index")?>"><?=Yii::t('app', 'MenuUserManage')?></a>
                                            </li>
                                            <li><a href="<?=Url::to("/user-group/index")?>"><?=Yii::t('app', 'MenuUserGroup')?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="panel panel-default dropdown">
                                <a data-toggle="collapse" href="#dropdown-table">
                                    <span class="icon fa fa-table"></span><span class="title"><?=Yii::t('app','MenuContentConfig')?></span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <div id="dropdown-table" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="<?=Url::to("/nodes/index")?>"><?=Yii::t('app', 'MenuNodeManage')?></a>
                                            <li><a href="<?=Url::to("/category/view?id=1")?>"><?=Yii::t('app', 'MenuCategoryManage')?></a>
                                            <li><a href="<?=Url::to("/attr-group/index")?>"><?=Yii::t('app', 'MenuAttrGroupManage')?></a>
                                            <li><a href="<?=Url::to("/check-group/index")?>"><?=Yii::t('app', 'MenuCheckGroup')?></a>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="panel panel-default dropdown">
                                <a data-toggle="collapse" href="#dropdown-form">
                                    <span class="icon fa fa-file-text-o"></span><span class="title"><?=Yii::t('app','MenuContentManage')?></span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <div id="dropdown-form" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="<?=Url::to("/content/index")?>"><?=Yii::t('app', 'MenuContentManage')?></a>

                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
            <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body">
                    <?= $content ?>
                </div>
            </div>
        </div>
        <footer class="app-footer">
            <div class="wrapper">
                <span class="pull-right">2.1 <a href="#"><i class="fa fa-long-arrow-up"></i></a></span> © 2015 Copyright.
            </div>
        </footer>
        <div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
