<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tpr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tpr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tpr_sby')->textInput() ?>

    <?= $form->field($model, 'mandor_sby')->textInput() ?>

    <?= $form->field($model, 'tpr_caruban')->textInput() ?>

    <?= $form->field($model, 'mandor_caruban')->textInput() ?>

    <?= $form->field($model, 'tpr_ngawi')->textInput() ?>

    <?= $form->field($model, 'mandor_ngawi')->textInput() ?>

    <?= $form->field($model, 'tpr_solo')->textInput() ?>

    <?= $form->field($model, 'mandor_solo')->textInput() ?>

    <?= $form->field($model, 'tpr_kartosuro')->textInput() ?>

    <?= $form->field($model, 'mandor_kartosuro')->textInput() ?>

    <?= $form->field($model, 'tpr_salatiga')->textInput() ?>

    <?= $form->field($model, 'mandor_salatiga')->textInput() ?>

    <?= $form->field($model, 'tpr_semarang')->textInput() ?>

    <?= $form->field($model, 'mandor_semarang')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
