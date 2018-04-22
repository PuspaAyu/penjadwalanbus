<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tilangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tilangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tanggal_tilangan')->textInput() ?>

    <?= $form->field($model, 'denda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_pelanggaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_kejadian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_batas_tilang')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
