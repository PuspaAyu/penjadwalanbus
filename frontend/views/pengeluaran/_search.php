<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PengeluaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengeluaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pengeluaran') ?>

    <?= $form->field($model, 'solar_pergi') ?>

    <?= $form->field($model, 'solar_pulang') ?>

    <?= $form->field($model, 'um_sopir') ?>

    <?= $form->field($model, 'um_kondektur') ?>

    <?php // echo $form->field($model, 'cuci bis') ?>

    <?php // echo $form->field($model, 'tpr') ?>

    <?php // echo $form->field($model, 'tol') ?>

    <?php // echo $form->field($model, 'siaran') ?>

    <?php // echo $form->field($model, 'parkir') ?>

    <?php // echo $form->field($model, 'lain_lain') ?>

    <?php // echo $form->field($model, 'uang_minuman') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
