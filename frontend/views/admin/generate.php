<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use frontend\models\JadwalBus;
/* @var $this yii\web\View */

$this->title = 'Penjadwalan SMPN 3 Taman';
?>

<div class="jadwalbus-form">

    <?php $form = ActiveForm::begin(); ?>

    <input type="text" name="tanggalJadwal" id="tanggalJadwal" class="form-control">

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$("form").submit(function(e){
		var regexp = new RegExp(/^([2-9][0-9][0-9][0-9])-([2-9][0-9][0-9][0-9])$/)
		if( regexp.test($("#tahunAjar").val())==false){
	        e.preventDefault();
		}
	});	
</script>