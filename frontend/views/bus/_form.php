<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use kartik\widgets\Select2;
use frontend\models\Jurusan;
use frontend\models\Bus;
use frontend\models\Karcis;


/* @var $this yii\web\View */
/* @var $model frontend\models\Bus */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="bus-form">

    <?php $form = ActiveForm::begin(); ?>
   
    <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'no_polisi')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
    	<?= $form->field($model, 'jam_operasional')->widget(Select2::className(),[
                'data' => \yii\helpers\ArrayHelper::map(Bus::find()->all(),'jam_operasional','jam_operasional'),
                'options' => ['placeholder' => 'Pilih Jam Berangkat'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_jurusan')->widget(Select2::className(),[
                'data' => \yii\helpers\ArrayHelper::map(Jurusan::find()->all(),'id_jurusan','jurusan'),
                'options' => ['placeholder' => 'Pilih Jurusan'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
        <?= $form->field($model, 'id_karcis')->widget(Select2::className(),[
                'data' => \yii\helpers\ArrayHelper::map(karcis::find()->all(),'id_karcis','seri'),
                'options' => ['placeholder' => 'Pilih Karcis'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
