<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TilanganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tilangan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tilangan') ?>

    <?= $form->field($model, 'tanggal_tilangan') ?>

    <?= $form->field($model, 'denda') ?>

    <?= $form->field($model, 'jenis_pelanggaran') ?>

    <?= $form->field($model, 'tempat_kejadian') ?>

    <?php // echo $form->field($model, 'tanggal_batas_tilang') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
