<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\KarcisSetor;
use kartik\widgets\Select2;
use frontend\models\JadwalBus;


/* @var $this yii\web\View */
/* @var $model frontend\models\Setor */
/* @var $form yii\widgets\ActiveForm */
?>


<?php 
// var_dump($data);
// die();

$modelKarcis = KarcisSetor::find()->where(['id_karcis' => $model->id_karcis])->one();

?>

<div class="setor-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?php //echo 'Id Jadwal :' . $model->id_jadwal ?> -->

    <?php $karcis_setor =  KarcisSetor::find()->select('pergi_awal')->where(['id_karcis' => $model->id_jadwal])->one(); ?>
    <?php $karcis_setor =  KarcisSetor::find()->select('pergi_akhir')->where(['id_karcis' => $model->id_jadwal])->one(); ?>
    <?php $karcis_setor =  KarcisSetor::find()->select('pulang_awal')->where(['id_karcis' => $model->id_jadwal])->one(); ?>
    <?php $karcis_setor =  KarcisSetor::find()->select('pulang_akhir')->where(['id_karcis' => $model->id_jadwal])->one(); ?>
    <?php $jadwal_setor =  JadwalBus::find()->select('id_sopir')->where(['id_sopir' => $model->id_jadwal])->one(); ?>
    
                        
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
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">TPR KEMANDORAN</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body"> 
                                <div class="form-group">

                                <div>
                                    <p>SURABAYA</p>

                                    <div class="col-md-6col-sm-4 col-xs-6 form-group has-feedback">
                                        <?= $form->field($model, 'tpr_sby')->textInput() ?>
                                    </div>

                                    <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                        <?= $form->field($model, 'mandor_sby')->textInput() ?>
                                    </div>
                                </div>

                                <div>
                                    <p>CARUBAN</p>

                                    <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                        <?= $form->field($model, 'tpr_caruban')->textInput() ?>
                                    </div>

                                    <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                        <?= $form->field($model, 'mandor_caruban')->textInput() ?>
                                    </div>
                                </div>

                                <div>
                                    <p>NGAWI</p>

                                    <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                        <?= $form->field($model, 'tpr_ngawi')->textInput() ?>
                                    </div>

                                    <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                        <?= $form->field($model, 'mandor_ngawi')->textInput() ?>
                                    </div>
                                </div>

                                <div>
                                    <p>SOLO</p>

                                    <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                        <?= $form->field($model, 'tpr_solo')->textInput() ?>
                                    </div>

                                    <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                        <?= $form->field($model, 'mandor_solo')->textInput() ?>
                                    </div>
                                </div>

                                <div>
                                    <p>KARTOSURO</p>

                                    <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                        <?= $form->field($model, 'tpr_kartosuro')->textInput() ?>
                                    </div>

                                    <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                        <?= $form->field($model, 'mandor_kartosuro')->textInput() ?>
                                    </div>
                                </div>

                                <div>
                                    <p>SALATIGA</p>

                                    <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                        <?= $form->field($model, 'tpr_salatiga')->textInput() ?>
                                    </div>

                                    <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                        <?= $form->field($model, 'mandor_salatiga')->textInput() ?>
                                    </div>
                                </div>

                                <div>
                                    <p>SEMARANG</p>

                                    <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                        <?= $form->field($model, 'tpr_semarang')->textInput() ?>
                                    </div>

                                    <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                        <?= $form->field($model, 'mandor_semarang')->textInput() ?>
                                    </div>
                                </div>
                                

                                 </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">BON</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">

                            <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                    <?= $form->field($model, 'bon_sopir')->textInput() ?>
                                </div>

                                <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                    <?= $form->field($model, 'bon_kondektur')->textInput() ?>
                                </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">SOLAR</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">

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

                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">KARCIS</a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">

                                <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
                                    <?= $form->field($modelKarcis, 'pergi_awal')->textInput(['readonly'=>true,'value' => $data['pergi_awal']]) ?>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
                                    <?= $form->field($modelKarcis, 'pergi_akhir')->textInput(['value' => 0]) ?>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
                                    <?= $form->field($model, 'rit_1')->textInput() ?>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
                                    <?= $form->field($modelKarcis, 'pulang_awal')->textInput(['readonly'=>true,'value' =>$data['pulang_awal']]) ?>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
                                    <?= $form->field($modelKarcis, 'pulang_akhir')->textInput(['value' => 0]) ?>
                                </div>
                                
                                <div class="col-md-4 col-sm-4 col-xs-6 form-group has-feedback">
                                    <?= $form->field($model, 'rit_2')->textInput() ?>
                                </div>

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">PENGELUARAN</a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">

                            <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                <?= $form->field($model, 'um_sopir')->textInput() ?>
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                <?= $form->field($model, 'um_kond')->textInput() ?>
                            </div>

                            <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                <?= $form->field($model, 'cuci_bis')->textInput() ?>
                            </div>

                            <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                <?= $form->field($model, 'tpr2')->textInput() ?>
                            </div>

                            <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                <?= $form->field($model, 'tol')->textInput() ?>
                            </div>

                            <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                <?= $form->field($model, 'siaran')->textInput() ?>
                            </div>

                            <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                <?= $form->field($model, 'lain_lain')->textInput() ?>
                            </div>

                            <div class="col-md-6 col-sm-4 col-xs-6 form-group has-feedback">
                                <?= $form->field($model, 'potong_minum')->textInput() ?>
                            </div>
                            
                                </div>
                            </div>
                        </div>


                    <div class="col-lg-4">
                        <br>
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