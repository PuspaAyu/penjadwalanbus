<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Jurusan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jurusan-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-4 col-sm-4  form-group has-feedback">
	    <?= $form->field($model, 'jurusan')->textInput(['maxlength' => true]) ?>
	    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
