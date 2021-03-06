<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use frontend\models\Jabatan;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pegawai */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="pegawai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_induk')->textInput() ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_tlp')->textInput() ?>

    <!-- <?= $form->field($model, 'id_jabatan')->textInput() ?> -->

    <?= $form->field($model, 'id_jabatan')->widget(Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(Jabatan::find()->all(),'id_jabatan','jenis_jabatan'),
            'options' => ['placeholder' => 'Pilih Jenis Jabatan...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

    <!-- <?= $form->field($model, 'tgl_masuk')->textInput(['maxlength' => true]) ?> -->

    <?php echo '<label class="control-label">Tanggal Masuk</label>';
            echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'tgl_masuk',
                'name' => 'dp_3',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'value' => '23-Feb-1982',
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); 
    ?>

    <?= $form->field($model, 'kota')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
