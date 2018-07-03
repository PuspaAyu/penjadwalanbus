<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TprSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tpr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tpr') ?>

    <?= $form->field($model, 'tpr_sby') ?>

    <?= $form->field($model, 'mandor_sby') ?>

    <?= $form->field($model, 'tpr_caruban') ?>

    <?= $form->field($model, 'mandor_caruban') ?>

    <?php // echo $form->field($model, 'tpr_ngawi') ?>

    <?php // echo $form->field($model, 'mandor_ngawi') ?>

    <?php // echo $form->field($model, 'tpr_solo') ?>

    <?php // echo $form->field($model, 'mandor_solo') ?>

    <?php // echo $form->field($model, 'tpr_kartosuro') ?>

    <?php // echo $form->field($model, 'mandor_kartosuro') ?>

    <?php // echo $form->field($model, 'tpr_salatiga') ?>

    <?php // echo $form->field($model, 'mandor_salatiga') ?>

    <?php // echo $form->field($model, 'tpr_semarang') ?>

    <?php // echo $form->field($model, 'mandor_semarang') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
