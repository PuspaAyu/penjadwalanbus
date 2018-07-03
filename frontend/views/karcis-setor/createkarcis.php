<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\Jadwalbus;
use yii\models\Bus;
use yii\helpers\Url;
use frontend\models\Pegawai;
use frontend\models\Jurusan;
use kartik\widgets\Select2;
use frontend\models\Karcis;
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
    <div class="table-responsive">
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
        <?php $seri = Karcis::find()->where(['id_stok'=>$tempviewjadwal['id_karcis']])->one(); ?>

        <tr>
          <?php $form = ActiveForm::begin(); ?>

          <input type="hidden" name="id_karcis" value="<?=  $tempviewjadwal['id_karcis'];  ?>" />
          <td><?= $i+1 ?></td>
          <td><?= $tempviewjadwal['jam'] ?></td>
          <td><?= $tempviewjadwal['no_polisi'] ?></td>
          <td><?= $jur['jurusan'] ?></td>
          <td><?= $nmsopir['nama'] ?></td>
          <td><?= $nmkonde['nama'] ?></td>
          <td><?= $seri['seri'] ?></td>
          
          <td>
            <?php if($tempviewjadwal['pergi_awal'] == 0){ ?>
            <?= $form->field($model, 'pergi_awal')->textInput(['style'=>'width:70px', 'value' => $tempviewjadwal['pergi_awal']])->label(false) ?>
            <?php } else { 
              echo $tempviewjadwal['pergi_awal']; 
              echo Html::input('hidden', 'pergi_awal', $tempviewjadwal['pergi_awal']);
            }
            ?>
          </td>
          <td>
            <?php if($tempviewjadwal['pergi_akhir'] == 0){ ?>
           <?= $form->field($model, 'pergi_akhir')->textInput(['style'=>'width:70px', 'value' => $tempviewjadwal['pergi_akhir']])->label(false) ?>
           <?php } else { 
              echo $tempviewjadwal['pergi_akhir']; 
              echo Html::input('hidden', 'pergi_akhir', $tempviewjadwal['pergi_akhir']);
            }
            ?>
          </td>
          <td>
            <?php if($tempviewjadwal['pulang_awal'] == 0){ ?>
            <?= $form->field($model, 'pulang_awal')->textInput(['style'=>'width:70px', 'value' => $tempviewjadwal['pulang_awal']])->label(false) ?>
            <?php } else { 
              echo $tempviewjadwal['pulang_awal']; 
              echo Html::input('hidden', 'pulang_awal', $tempviewjadwal['pulang_awal']);
            }
            ?>            
          </td>
          <td>
          <?php if($tempviewjadwal['pulang_akhir'] == 0){ ?>
           <?= $form->field($model, 'pulang_akhir')->textInput(['style'=>'width:70px', 'value' => $tempviewjadwal['pulang_akhir']])->label(false) ?>
           <?php } else { 
              echo $tempviewjadwal['pulang_akhir']; 
              echo Html::input('hidden', 'pulang_akhir', $tempviewjadwal['pulang_akhir']);
            }
            ?>
          </td>
          <td>
            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-xs']) ?>
            <!-- <?= Html::submitButton('Edit', ['class' => 'btn btn-warning btn-xs']) ?> -->
          </td>
          <?php ActiveForm::end(); ?>
        </tr>
      <?php 
          $i++;
        endforeach; 
      ?>
    </table>
  </div>
    
  </div>

 
    </table>
  </div>
</div>