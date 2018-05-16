<?php

/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'Penjadwalan EKA MIRA';
?>
<div class="site-index" >

    <div class="jumbotron">
        <h1>SELAMAT DATANG</h1>

        <p class="lead">SISTEM PENJADWALAN EKA MIRA</p>

    </div>

    <div class="body-content">
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
        <?php ActiveForm::end(); ?>
        <!-- <div class="row"> -->
        <div class="row" style="margin-top: 5%">
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
</div>
