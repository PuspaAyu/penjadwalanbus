<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\Select2;
use frontend\models\Bus;

/* @var $this yii\web\View */
/* @var $model frontend\models\Komplain */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="komplain-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jadwal')->widget(Select2::className(),[
                'data' => \yii\helpers\ArrayHelper::map(Bus::find()->all(),'id_bus','no_polisi'),
                'options' => ['placeholder' => 'Pilih No Polisi'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>

    <?= $form->field($model, 'isi_komplain')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'tgl_komplain')->textInput() ?> -->

    <?php echo '<label class="control-label">Tanggal Komplain</label>';
			echo DatePicker::widget([
				'model' => $model,
				'attribute' => 'tgl_komplain',
			    'name' => 'dp_3',
			    'type' => DatePicker::TYPE_COMPONENT_APPEND,
			    'value' => '23-Feb-1982',
			    'pluginOptions' => [
			        'autoclose'=>true,
			        'format' => 'yyyy-mm-dd'
			    ]
			]); 
	?>
	<br>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
