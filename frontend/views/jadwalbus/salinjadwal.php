<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use kartik\widgets\Select2;
use frontend\models\Bus;
use frontend\models\Pegawai;
use frontend\models\Jadwalbus;

/* @var $this yii\web\View */
/* @var $model frontend\models\Jadwalbus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwalbus-form">

    <?php $form = ActiveForm::begin(); ?>

    <p>
        salin jadwal dari tanggal <?= $salintanggal ?>
    </p>

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
    <br>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
