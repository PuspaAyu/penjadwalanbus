<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use kartik\widgets\Select2;
use frontend\models\Jurusan;
use frontend\models\Bus;
// $listjam = [
// 	'1'=>'00.50', '2'=>'01.17', '3'=>'02.00', '4'=>'03.00',
// 	'5'=>'03.30', '6'=>'04.00', '7'=>'04.23', '8'=>'04.40',
// 	'9'=>'05.02', '10'=>'05.15', '11'=>'05.30', '12'=>'05.50',
// 	'13'=>'06.05', '14'=>'06.20', '15'=>'06.33', '16'=>'06.47',
// 	'17'=>'07.00', '18'=>'07.15', '19'=>'07.30', '20'=>'07.39',
// 	'21'=>'07.40', '22'=>'08.00', '23'=>'08.15',
// ]

/* @var $this yii\web\View */
/* @var $model frontend\models\Bus */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="bus-form">

    <?php $form = ActiveForm::begin(); ?>
   
    <?= $form->field($model, 'no_polisi')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'jam_operasional')->widget(Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(Bus::find()->all(),'jam_operasional','jam_operasional'),
            'options' => ['placeholder' => 'Pilih Jam Berangkat'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>


    <?= $form->field($model, 'id_jurusan')->widget(Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(Jurusan::find()->all(),'id_jurusan','jurusan'),
            'options' => ['placeholder' => 'Pilih Jurusan'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) ?>

	<br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
