<?php

/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'Penjadwalan EKA MIRA';
?>
<div class="site-index">

    <center><h1>Selamat Datang, ADMIN KEUANGAN!</h1></center>

    <div class="body-content">
        <?php $form = ActiveForm::begin(['action' => Yii::$app->homeUrl.'site/view-jadwal']); ?>
       
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
