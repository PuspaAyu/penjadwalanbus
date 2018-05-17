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
    <<!-- div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div> -->
                <div class="col-lg-4">
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
                    <br>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
