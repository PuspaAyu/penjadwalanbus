<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Karcis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karcis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'karcis_pergi')->textInput() ?>

    <?= $form->field($model, 'karcis_pulang')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
