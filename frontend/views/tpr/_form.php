<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tpr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tpr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'terminal')->textInput() ?>

    <?= $form->field($model, 'tpr')->textInput() ?>

    <?= $form->field($model, 'kemandoran')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
