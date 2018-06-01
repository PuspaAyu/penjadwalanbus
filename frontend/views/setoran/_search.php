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

    <?= $form->field($model, 'id_karcis') ?>

    <?= $form->field($model, 'id_bon') ?>

    <?= $form->field($model, 'id_tpr') ?>

    <?= $form->field($model, 'id_pengeluaran') ?>

    <?php // echo $form->field($model, 'pendapatan_kotor') ?>

    <?php // echo $form->field($model, 'bersih_perjalanan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
