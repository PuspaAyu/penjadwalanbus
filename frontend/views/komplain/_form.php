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

    <?php echo '<label class="control-label">Tanggal Perjalanan</label>';
			echo DatePicker::widget([
				'model' => $model,
				'attribute' => 'tanggal',
			    'name' => 'dp_3',
			    'type' => DatePicker::TYPE_COMPONENT_APPEND,
			    'value' => '23-Feb-1982',
			    'pluginOptions' => [
			        'autoclose'=>true,
			        'format' => 'yyyy-mm-dd'
			    ]
			]); 
	?>

    <?= $form->field($model, 'isi_komplain')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
