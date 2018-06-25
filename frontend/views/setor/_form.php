<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Setor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jadwal')->textInput() ?>
    
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Setoran
            </div>
            <!-- .panel-heading -->
            <div class="panel-body">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">SOLAR</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body"> 
                            <div class="col-lg-4">                                       
                                <div class="form-group">
                                <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                    <?= $form->field($model, 'solar_pergi')->textInput() ?>
                                </div>

                                <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                    <?= $form->field($model, 'nom_solar_pergi')->textInput() ?>
                                </div>

                                <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                    <?= $form->field($model, 'solar_plg')->textInput() ?>
                                </div>

                                <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                    <?= $form->field($model, 'nom_solar_plg')->textInput() ?>
                                </div>
                                 </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">PENGELUARAN</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">

                            <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                <?= $form->field($model, 'um_sopir')->Input('number', ['min'=>1, 'step'=>1]) ?>
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                <?= $form->field($model, 'um_kond')->textInput() ?>
                            </div>
                            <?= $form->field($model, 'cuci_bis')->textInput() ?>

                            <?= $form->field($model, 'tpr')->textInput() ?>

                            <?= $form->field($model, 'tol')->textInput() ?>

                            <?= $form->field($model, 'siaran')->textInput() ?>

                            <?= $form->field($model, 'lain_lain')->textInput() ?>

                            <?= $form->field($model, 'potong_minum')->textInput() ?>
                                </div>
                            </div>
                        </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                    </div>                      
                </div>
            </div>
            <!-- .panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>