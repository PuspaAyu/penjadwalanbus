<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Bon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pegawai')->textInput() ?>
    <?= $form->field($model, 'tgl')->textInput() ?>
    <?= $form->field($model, 'nominal')->textInput() ?>
    <?= $form->field($model, 'tipe')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
