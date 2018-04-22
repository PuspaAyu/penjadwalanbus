<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Hutang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hutang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jumlah_hutang')->textInput() ?>

    <?= $form->field($model, 'status_hutang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alasan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
