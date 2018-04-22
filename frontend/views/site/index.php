<?php

/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'Penjadwalan EKA MIRA';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>SELAMAT DATANG</h1>

        <p class="lead">SISTEM PENJADWALAN EKA MIRA</p>

    </div>

    <div class="body-content">
        <?php $form = ActiveForm::begin(['action' => Yii::$app->homeUrl.'site/view-jadwal']); ?>
        <div class="row">
            <div class="col-lg-3">
                <center><?= Html::submitButton('Jadwal', ['class' => 'btn btn-lg btn-success','value'=>1, 'name'=>'jadwal']); ?></center>
            </div>
            <div class="col-lg-3">
                <center><?= Html::submitButton('Izin', ['class' => 'btn btn-lg btn-success','value'=>2, 'name'=>'izin']); ?></center>
            </div>
            <div class="col-lg-3">
                <center><?= Html::submitButton('Bus', ['class' => 'btn btn-lg btn-success','value'=>3, 'name'=>'bus']); ?></center>
            </div>
            <div class="col-lg-3">
                <center><?= Html::submitButton('Komplain', ['class' => 'btn btn-lg btn-success','value'=>3, 'name'=>'komplain']); ?></center>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <!-- <div class="row"> -->
        <div class="row" style="margin-top: 5%">
            <div class="col-lg-3">
                <center><?= Html::submitButton('Rekap Keuangan', ['class' => 'btn btn-lg btn-success','value'=>1, 'name'=>'rekapuang']); ?></center>
            </div>
            <div class="col-lg-3">
                <center><?= Html::submitButton('Rekap Karcis', ['class' => 'btn btn-lg btn-success','value'=>2, 'name'=>'rekapkarcis']); ?></center>
            </div>
            <div class="col-lg-3">
                <center><?= Html::submitButton('Rekap Gaji', ['class' => 'btn btn-lg btn-success','value'=>3, 'name'=>'rekapgaji']); ?></center>
            </div>
            <div class="col-lg-3">
                <center><?= Html::submitButton('Tilangan', ['class' => 'btn btn-lg btn-success','value'=>3, 'name'=>'Tilangan']); ?></center>
            </div>
        </div>

    </div>
</div>
