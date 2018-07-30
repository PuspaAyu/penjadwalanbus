<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use frontend\models\Tilangan;
use frontend\models\Bus;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tilangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tilangan-form">

    <?php $form = ActiveForm::begin(); ?>

    
     
        <?= $form->field($model, 'id_jadwal')->widget(Select2::className(),[
                'data' => \yii\helpers\ArrayHelper::map(Bus::find()->all(),'id_bus','no_polisi'),
                'options' => ['placeholder' => 'Pilih No Polisi'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>

   
    <?= $form->field($model, 'denda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_pelanggaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_kejadian')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'tanggal_batas_tilang')->textInput() ?> -->

    <?php echo '<label class="control-label">Tanggal Batas Tilang</label>';
            echo DatePicker::widget([
                'model' => $model,
                'attribute' => 'tanggal_batas_tilang',
                'name' => 'dp_3',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'value' => '23-Feb-1982',
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); 
    ?>

    <?= $form->field($model, 'status')->dropDownList(['1'=> 'belum', '2'=> 'sudah']) ?>

 
    
     



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
