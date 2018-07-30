<?php

/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title = 'Penjadwalan EKA MIRA';
?>
<div class="site-index">

    <!-- <div class="jumbotron"> -->
       <center><h1>Selamat Datang, ADMIN KARCIS!</h1></center>


    </div>

    <div class="body-content">
        <?php $form = ActiveForm::begin(['action' => Yii::$app->homeUrl.'site/view-jadwal']); ?>
       
        <?php ActiveForm::end(); ?>
        <!-- <div class="row"> -->
        <div class="row" style="margin-top: 5%">
            
            <div class="col-md-4 col-md-offset-1">
                <center><?= Html::a('Rekap Karcis', ['view-karcis'], ['class' => 'btn btn-lg btn-success','value'=>2, 'name'=>'rekapkarcis']); ?></center>
            </div>
            
            <div class="col-md-4 col-md-offset-1">
                <center><?= Html::a('Tilangan', ['tilangan/index'], ['class' => 'btn btn-lg btn-success','value'=>3, 'name'=>'Tilangan']); ?></center>
            </div>
        </div>

    </div>
</div>
