<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Stok */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stok-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipe_karcis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stok_jmlh_karcis')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
