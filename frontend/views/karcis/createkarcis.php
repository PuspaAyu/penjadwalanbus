<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\Jadwalbus;
use yii\models\Bus;
use yii\helpers\Url;
use frontend\models\Pegawai;
use frontend\models\Jurusan;
use kartik\widgets\Select2;
use frontend\models\Stok;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JadwalbusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karcis';
// print_r($tempviewjadwal);
?>

<div class="panel panel-primary">
  <div class="panel-heading">
          INPUT KARCIS PER BUS
        </div>

  <div class = "panel-body">
    <table class="table table-bordered table-responsive">
      <tr>
        <th rowspan="2" style="text-align: center; padding-top: 25px">No</th>
        <th rowspan="2" style="text-align: center; padding-top: 25px">Jam</th>
        <th rowspan="2" style="text-align: center; padding-top: 25px">No Polisi</th>
        <th rowspan="2" style="text-align: center; padding-top: 25px">Jurusan</th>
        <th rowspan="2" style="text-align: center; padding-top: 25px">Sopir</th>
        <th rowspan="2" style="text-align: center; padding-top: 25px">Kondektur</th>
        <th rowspan="2" style="text-align: center; padding-top: 25px">Tipe Karcis</th>
        <th colspan="4" style="text-align: center">Karcis</th>
        <th rowspan="2" style="text-align: center; padding-top: 25px">Aksi</th>
      </tr>
      <tr style="text-align: center">
        <td colspan="2">Pergi</td>
        <td colspan="2">Pulang</td>
      </tr>


      <?php $i=0; foreach ($tempviewjadwal as $tempviewjadwal):?>  
        <?php $nmsopir = Pegawai::find()->where(['id_pegawai'=>$tempviewjadwal['id_sopir']])->one();?>
        <?php $nmkonde = Pegawai::find()->where(['id_pegawai'=>$tempviewjadwal['id_kondektur']])->one();?>
        <?php $jur = Jurusan::find()->where(['id_jurusan'=>$tempviewjadwal['id_jurusan']])->one(); ?>
        <tr>
          <?php $form = ActiveForm::begin(); ?>

          <input type="hidden" name="id_karcis" value="<?=  $tempviewjadwal['id_karcis'];  ?>" />
          <td><?= $i+1 ?></td>
          <td><?= $tempviewjadwal['jam'] ?></td>
          <td><?= $tempviewjadwal['id_bus'] ?></td>
          <td><?= $jur['jurusan'] ?></td>
          <td><?= $nmsopir['nama'] ?></td>
          <td><?= $nmkonde['nama'] ?></td>
          <td>
            <?php if($tempviewjadwal['id_stok'] == 0){ ?>
            <?= Html::dropDownList('tipe_karcis', null, $tipe_karcis, ['prompt'=>'Karcis', 'class'=>'form-control']); ?>
            <?php } else { 
              echo $tipe_karcis[$tempviewjadwal['id_stok']]; 
              echo Html::input('hidden', 'tipe_karcis', $tempviewjadwal['id_stok']);
            } ?>
           
          </td>
          <td>
            <?= $form->field($model, 'pergi_awal')->textInput(['style'=>'width:70px', 'value' => $tempviewjadwal['pergi_awal']])->label(false) ?>
          </td>
          <td>
           <?= $form->field($model, 'pergi_akhir')->textInput(['style'=>'width:70px', 'value' => $tempviewjadwal['pergi_akhir']])->label(false) ?>
          </td>
          <td>
            <?= $form->field($model, 'pulang_awal')->textInput(['style'=>'width:70px', 'value' => $tempviewjadwal['pulang_awal']])->label(false) ?>            
          </td>
          <td>
           <?= $form->field($model, 'pulang_akhir')->textInput(['style'=>'width:70px', 'value' => $tempviewjadwal['pulang_akhir']])->label(false) ?>
          </td>
          <td>
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::submitButton('Edit', ['class' => 'btn btn-primary']) ?>
          </td>
          <?php ActiveForm::end(); ?>
        </tr>
      <?php 
        if($i == count($tipe_karcis)-1)
          $i=$i;
        else
          $i++;
        endforeach; 
      ?>
    </table>
    
  </div>

 
    </table>
  </div>
</div>