<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\TemplateAsset;

TemplateAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>

<body>
    <?php $this->beginBody() ?>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=Yii::$app->homeUrl?>admin">Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <!-- <a href="/site/logout">
                        <i class="fa fa-tasks fa-fw"></i>
                    </a> -->
                    <?= Html::a(
                        '<i class="fa fa-tasks fa-fw"></i>',
                        ['/site/logout'],
                        ['data-method' => 'post']
                    )?>
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?=Yii::$app->homeUrl?>adminkarcis/index"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="<?=Yii::$app->homeUrl?>/karcis/index"><i class="fa fa-table fa-fw"></i> Karcis</a>
                        </li>
                        <li>
                            <a href="<?=Yii::$app->homeUrl?>/stok/index"><i class="fa fa-edit fa-fw"></i> Stok</a>
                        </li>
                                                
                        <li>
                            <a href="<?=Yii::$app->homeUrl?>/tilangan/index"><i class="fa fa-sitemap fa-fw"></i> Tilangan</span></a>
                            <!-- /.nav-second-level -->
                        </li>
                    
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Navigation -->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12" style="background-color: #FFF">
                    <h4 class="page-header">Penjadwalan EKA MIRA</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                <?= $content ?>
            <!-- /.row -->
            <!-- /.row -->            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php $this->endBody() ?>   
</body>

</html>
<?php $this->endPage() ?>