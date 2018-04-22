<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Setoran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setoran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pendapatan_kotor')->textInput() ?>

    <?= $form->field($model, 'pendapatan_bersih')->textInput() ?>

    <?= $form->field($model, 'pinjaman')->textInput() ?>

    <?= $form->field($model, 'solar')->textInput() ?>

    <?= $form->field($model, 'ongkos')->textInput() ?>

    <!-- <?= $form->field($model, 'tgl_setor')->textInput() ?> -->
    <?php echo TimePicker::widget([
            'model' => $model,
            'attribute' => 'tgl_setor',
            'name' => 't1',
            'pluginOptions' => [
                'showSeconds' => true,
                'showMeridian' => false,
                'minuteStep' => 1,
                'secondStep' => 5,
            ]
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
