<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\JadwalbusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwalbus-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_jadwal') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'jam_berangkat') ?>

    <?= $form->field($model, 'id_bus') ?>

    <?= $form->field($model, 'id_pegawai') ?>

    <?php // echo $form->field($model, 'jam_datang') ?>

    <?php // echo $form->field($model, 'id_jurusan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
