<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Jadwalbus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwalbus-form">

    <?php $form = ActiveForm::begin(); ?>

   <?php echo '<label class="control-label">Tanggal</label>';
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
    
    <?php echo '<label class="control-label">Jam Berangkat</label>';
        echo TimePicker::widget([
            'model' => $model,
            'attribute' => 'jam_berangkat',
            'name' => 't1',
            'pluginOptions' => [
                'showSeconds' => true,
                'showMeridian' => false,
                'minuteStep' => 1,
                'secondStep' => 5,
            ]
        ]);
    ?>

    <?= $form->field($model, 'id_bus')->textInput() ?>

    <?= $form->field($model, 'id_pegawai')->textInput() ?>

    <?= $form->field($model, 'jam_datang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_jurusan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
