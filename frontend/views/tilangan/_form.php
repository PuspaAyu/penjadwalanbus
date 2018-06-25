<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use frontend\models\Tilangan;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tilangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tilangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jadwal')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'denda')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_pelanggaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_kejadian')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'tanggal_batas_tilang')->textInput() ?> -->

    <?php echo '<label class="control-label">Tanggal Izin</label>';
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

 
    
        <?= $form->field($model, 'status')->widget(Select2::className(),[
                'data' => \yii\helpers\ArrayHelper::map(Tilangan::find()->all(),'id_tilangan','status'),
                'options' => ['placeholder' => 'Pilih Status'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
