<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Komplain */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="komplain-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jadwal')->textInput() ?>

    <?= $form->field($model, 'isi_komplain')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'tgl_komplain')->textInput() ?> -->

    <?php echo '<label class="control-label">Tanggal Izin</label>';
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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
