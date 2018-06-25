<?php

/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'Penjadwalan EKA MIRA';
?>
<div class="site-index" >

    <!-- <div class="jumbotron">
        <h1>SELAMAT DATANG</h1>

        <p class="lead">SISTEM PENJADWALAN EKA MIRA</p>

    </div> -->
<!-- Bootstrap Core CSS -->
    <link href="http://localhost/puspa/penjadwalanbus/vendor/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/puspa/penjadwalanbus/vendor/css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/puspa/penjadwalanbus/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

       <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>SELAMAT DATANG</h1>
                        <h3>PENJADWALAN BUS EKA MIRA</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <?= Html::a('Jadwal', ['view-jadwal'], ['class' => 'btn btn-default btn-lg']); ?>
                                <!-- <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a> -->
                            </li>
                            <li>
                                <?= Html::a('Bus',['view-bus'], ['class' => 'btn btn-default btn-lg']); ?>
                            </li>
                            <li>
                                <?= Html::a('Rekap Keuangan',['view-rekapuang'], ['class' => 'btn btn-default btn-lg']); ?>
                            </li>
                            <li>
                                <?= Html::a('Tilangan', ['view-tilangan'], ['class' => 'btn btn-default btn-lg']); ?>
                            </li>
                           <!--  <li>
                                <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg" style="background-color: orange"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

   <!--  <div class="body-content">
        <?php $form = ActiveForm::begin(['action' => Yii::$app->homeUrl.'site/view-jadwal']); ?>
        <div class="row">
            <div class="col-lg-3">
                <center><?= Html::a('Jadwal', ['view-jadwal'], ['class' => 'btn btn-lg btn-success']); ?></center>
            </div>
            <div class="col-lg-3">
                <center><?= Html::a('Izin', ['view-izin'], ['class' => 'btn btn-lg btn-success']); ?></center>
            </div>
            <div class="col-lg-3">
                <center><?= Html::a('Bus',['view-bus'], ['class' => 'btn btn-lg btn-success']); ?></center>
            </div>
            <div class="col-lg-3">
                <center><?= Html::a('Komplain',['view-komplain'], ['class' => 'btn btn-lg btn-success']); ?></center>
            </div>
        </div>
        <?php ActiveForm::end(); ?> -->
        <!-- <div class="row"> -->
        <!-- <div class="row" style="margin-top: 5%">
            <div class="col-lg-3">
                <center><?= Html::a('Rekap Keuangan',['view-rekapuang'], ['class' => 'btn btn-lg btn-success']); ?></center>
            </div>
            <div class="col-lg-3">
                <center><?= Html::a('Rekap Karcis', ['view-rekapkarcis'], ['class' => 'btn btn-lg btn-success']); ?></center>
            </div>
            <div class="col-lg-3">
                <center><?= Html::a('Rekap Gaji', ['view-rekapgaji'], ['class' => 'btn btn-lg btn-success']); ?></center>
            </div>
            <div class="col-lg-3">
                <center><?= Html::a('Tilangan', ['view-tilangan'], ['class' => 'btn btn-lg btn-success']); ?></center>
            </div>
        </div>

    </div>
</div> -->

<!-- jQuery -->
    <script src="http://localhost/puspa/penjadwalanbus/vendor/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/puspa/penjadwalanbus/vendor/js/bootstrap.min.js"></script>
