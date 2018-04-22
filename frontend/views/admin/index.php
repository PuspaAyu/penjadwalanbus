<<?php

/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'Penjadwalan EKA MIRA';
?>
<div class="site-index">

    <!-- <div class="jumbotron"> -->
       <center><h1>Selamat Datang, KABAG EKA!</h1></center>

        <!--<center><p class="lead">Untuk melihat jadwal belajar mengajar, silahkan pilih button dibawah ini</p></center>-->
    <!-- </div> -->
    <div class="body-content">
        <?php $form = ActiveForm::begin(['action' => Yii::$app->homeUrl.'admin/view-jadwal']); ?>
        <!--<div class="row">
            <div class="col-lg-4">
                <center><?= Html::submitButton('Kelas 7', ['class' => 'btn btn-lg btn-success','value'=>1, 'name'=>'kelas']); ?></center>
            </div>
            <div class="col-lg-4">
                <center><?= Html::submitButton('Kelas 8', ['class' => 'btn btn-lg btn-success','value'=>2, 'name'=>'kelas']); ?></center>
            </div>
            <div class="col-lg-4">
                <center><?= Html::submitButton('Kelas 9', ['class' => 'btn btn-lg btn-success','value'=>3, 'name'=>'kelas']); ?></center>
            </div>-->
        </div>
        <?php ActiveForm::end(); ?>
        <div class="row" style="margin-top: 1%;">
            <div class="col-lg-12">
                <center><a class="btn btn-lg btn-success" href="<?=Yii::$app->homeUrl?>admin/generate">Generate Jadwal Baru</a></center>
            </div>
        </div>

    </div>
</div>
