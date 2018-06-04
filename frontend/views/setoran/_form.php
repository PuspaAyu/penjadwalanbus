<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Setoran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setoran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_karcis')->textInput() ?>
    <?= $form->field($model, 'id_bon')->textInput() ?>
    <?= $form->field($model, 'id_tpr')->textInput() ?>
    <?= $form->field($model, 'id_pengeluaran')->textInput() ?>
    <?= $form->field($model, 'pendapatan_kotor')->textInput() ?>
    <?= $form->field($model, 'bersih_perjalanan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

