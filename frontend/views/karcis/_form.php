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
     <?= $form->field($model, 'id_stok')->widget(Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(Stok::find()->all(),'id_stok','tipe_karcis'),
            'options' => ['placeholder' => 'Pilih Kode Karcis'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>
    </div>


    <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'pergi_awal')->textInput() ?>
        <!-- <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="First Name"> -->
        <!-- <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span> -->
    </div>
    
    <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'pergi_akhir')->textInput() ?>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'pulang_awal')->textInput() ?>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'pulang_akhir')->textInput() ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
