<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use frontend\models\Terminal;
use frontend\models\Tpr;
use frontend\models\Bus;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tpr */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="table-responsive">
<div class="tpr-form">

    <?php $form = ActiveForm::begin(); ?>

    
        <?= $form->field($model, 'id_bus')->widget(Select2::className(),[
                'data' => \yii\helpers\ArrayHelper::map(Bus::find()->all(),'id_bus','no_polisi'),
                'options' => ['placeholder' => 'Pilih Bus'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
    
        <?= $form->field($model, 'id_terminal')->widget(Select2::className(),[
                'data' => \yii\helpers\ArrayHelper::map(Terminal::find()->all(),'id_terminal','terminal'),
                'options' => ['placeholder' => 'Pilih Terminal'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>

        <?= $form->field($model, 'tpr')->textInput() ?>
    
        <?= $form->field($model, 'kemandoran')->textInput() ?>
        
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
