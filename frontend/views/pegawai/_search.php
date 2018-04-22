<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PegawaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegawai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'no_induk') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'no_tlp') ?>

    <?php // echo $form->field($model, 'jabatan') ?>

    <?php // echo $form->field($model, 'riwayat_pendidikan') ?>

    <?php // echo $form->field($model, 'riwayat_pekerjaan') ?>

    <?php // echo $form->field($model, 'tgl_masuk') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'kota') ?>

    <?php // echo $form->field($model, 'ktp_habis') ?>

    <?php // echo $form->field($model, 'sim_habis') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
