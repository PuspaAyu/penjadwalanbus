<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\Select2;
use frontend\models\Pegawai;

/* @var $this yii\web\View */
/* @var $model frontend\models\Izin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pegawai')->widget(Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(Pegawai::find()->all(),'id_pegawai','nama'),
            'options' => ['placeholder' => 'Pilih Nama'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

    <!-- <?= $form->field($model, 'tgl_izin')->textInput() ?> -->
    <?php echo '<label class="control-label">Tanggal Izin</label>';
			echo DatePicker::widget([
				'model' => $model,
				'attribute' => 'tgl_izin',
			    'name' => 'dp_3',
			    'type' => DatePicker::TYPE_COMPONENT_APPEND,
			    'value' => '23-Feb-1982',
			    'pluginOptions' => [
			        'autoclose'=>true,
			        'format' => 'yyyy-mm-dd'
			    ]
			]); 
	?>
    <?= $form->field($model, 'jenis_izin')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
