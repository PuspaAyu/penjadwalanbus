<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pengeluaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengeluaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'solar_pergi')->textInput() ?>

    <?= $form->field($model, 'solar_pulang')->textInput() ?>

    <?= $form->field($model, 'um_sopir')->textInput() ?>

    <?= $form->field($model, 'um_kondektur')->textInput() ?>

    <?= $form->field($model, 'cuci bis')->textInput() ?>

    <?= $form->field($model, 'tpr')->textInput() ?>

    <?= $form->field($model, 'tol')->textInput() ?>

    <?= $form->field($model, 'siaran')->textInput() ?>

    <?= $form->field($model, 'parkir')->textInput() ?>

    <?= $form->field($model, 'lain_lain')->textInput() ?>

    <?= $form->field($model, 'uang_minuman')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
