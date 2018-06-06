<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FrontendSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_setor') ?>

    <?= $form->field($model, 'id_jadwal') ?>

    <?= $form->field($model, 'solar_pergi') ?>

    <?= $form->field($model, 'nom_solar_pergi') ?>

    <?= $form->field($model, 'solar_plg') ?>

    <?php // echo $form->field($model, 'nom_solar_plg') ?>

    <?php // echo $form->field($model, 'um_sopir') ?>

    <?php // echo $form->field($model, 'um_kond') ?>

    <?php // echo $form->field($model, 'cuci_bis') ?>

    <?php // echo $form->field($model, 'tpr') ?>

    <?php // echo $form->field($model, 'tol') ?>

    <?php // echo $form->field($model, 'siaran') ?>

    <?php // echo $form->field($model, 'lain_lain') ?>

    <?php // echo $form->field($model, 'potong_minum') ?>

    <?php // echo $form->field($model, 'pendapatan_kotor') ?>

    <?php // echo $form->field($model, 'bersih_perjalanan') ?>

    <?php // echo $form->field($model, 'total_bersih') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
