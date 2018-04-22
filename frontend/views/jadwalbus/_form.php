<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use kartik\widgets\Select2;
use frontend\models\Bus;
use frontend\models\Pegawai;

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

    <!-- <?= $form->field($model, 'id_bus')->textInput() ?> -->
    <?= $form->field($model, 'id_bus')->widget(Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(Bus::find()->all(),'id_bus','no_polisi'),
            'options' => ['placeholder' => 'Pilih Bus...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

    <!-- <?= $form->field($model, 'id_pegawai')->textInput() ?> -->
    <?= $form->field($model, 'id_pegawai')->widget(Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(Pegawai::find()->all(),'id_pegawai','nama'),
            'options' => ['placeholder' => 'Pilih Nama Pegawai...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

    <?= $form->field($model, 'jam_datang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_jurusan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
