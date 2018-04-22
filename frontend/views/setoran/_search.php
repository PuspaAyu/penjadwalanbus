<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SetoranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setoran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_setoran') ?>

    <?= $form->field($model, 'pendapatan_kotor') ?>

    <?= $form->field($model, 'pendapatan_bersih') ?>

    <?= $form->field($model, 'pinjaman') ?>

    <?= $form->field($model, 'solar') ?>

    <?php // echo $form->field($model, 'ongkos') ?>

    <?php // echo $form->field($model, 'tgl_setor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
