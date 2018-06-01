<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Setoran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setoran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pendapatan_kotor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
