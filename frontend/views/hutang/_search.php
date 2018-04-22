<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\HutangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hutang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_hutang') ?>

    <?= $form->field($model, 'jumlah_hutang') ?>

    <?= $form->field($model, 'status_hutang') ?>

    <?= $form->field($model, 'alasan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
