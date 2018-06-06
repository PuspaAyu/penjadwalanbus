<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use frontend\models\Stok;

/* @var $this yii\web\View */
/* @var $model frontend\models\Karcis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karcis-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'seri')->textInput() ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
