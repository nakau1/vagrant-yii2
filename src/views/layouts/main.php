<?php

/* @var $this \yii\web\View */
/* @var $user app\models\User */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\SBAdmin2Asset;
use app\models\User;

$user = Yii::$app->view->params['user'];

SBAdmin2Asset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><?= Yii::$app->name ?></a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="user/<?= $user->id ?>"><i class="fa fa-user fa-fw"></i> <?= $user->name ?></a></li>
                    <li class="divider"></li>
                    <li><a href="sign-out"><i class="fa fa-sign-out fa-fw"></i> サインアウト</a></li>
                </ul>
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="ファイルを検索...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li><a href="<?= Url::to('/') ?>"><i class="fa fa-dashboard fa-fw"></i> ダッシュボード</a></li>
                    <li><a href="<?= Url::to('/file') ?>"><i class="fa fa-files-o fa-fw"></i> ファイル</a></li>
                    <li><a href="<?= Url::to('/user') ?>"><i class="fa fa-users fa-fw"></i> ユーザ</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /#wrapper -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
