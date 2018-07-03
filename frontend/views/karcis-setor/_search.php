<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\KarcisSetorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karcis-setor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_karcis') ?>

    <?= $form->field($model, 'pergi_awal') ?>

    <?= $form->field($model, 'pergi_akhir') ?>

    <?= $form->field($model, 'pulang_awal') ?>

    <?= $form->field($model, 'pulang_akhir') ?>

    <?php // echo $form->field($model, 'id_jadwal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
