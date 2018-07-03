<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\KarcisSetor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karcis-setor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pergi_awal')->textInput() ?>

    <?= $form->field($model, 'pergi_akhir')->textInput() ?>

    <?= $form->field($model, 'pulang_awal')->textInput() ?>

    <?= $form->field($model, 'pulang_akhir')->textInput() ?>

    <?= $form->field($model, 'id_jadwal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
