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
                        '<i class="fa fa-sign-out"></i>',
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
                        <li><?= Html::a('<i class="fa fa-dashboard fa-fw"></i> Home', ['site/indexadmin']); ?></li>
                        <li><?= Html::a('<i class="fa fa-table fa-fw"></i> Jadwal', ['jadwalbus/index']); ?></li>
                        <li><?= Html::a('<i class="fa fa-bus fa-fw"></i> Bus', ['bus/index']); ?></li>
                        <li><?= Html::a('<i class="fa fa-road fa-fw"></i> Jurusan', ['jurusan/index']); ?></li>
                        <li><?= Html::a('<i class="fa fa-user fa-fw"></i> Pegawai', ['pegawai/index']); ?></li>
                        <li><?= Html::a('<i class="fa fa-exclamation-triangle fa-fw"></i> Izin', ['izin/index']); ?></li>
                        <li><?= Html::a('<i class="fa fa-comment fa-fw"></i> Komplain', ['komplain/index']); ?></li>
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