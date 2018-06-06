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

$this->title = 'Setoran';
// print_r($tempviewjadwal);
?>

<div class="panel panel-primary">
  <div class="panel-heading">
          INPUT SETORAN PER BUS
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
        <tr>
          

          <input type="hidden" name="id_karcis" value="<?=  $tempviewjadwal['id_karcis'];  ?>" />
          <td><?= $i+1 ?></td>
          <td><?= $tempviewjadwal['jam'] ?></td>
          <td><?= $tempviewjadwal['id_bus'] ?></td>
          <td><?= $jur['jurusan'] ?></td>
          <td><?= $nmsopir['nama'] ?></td>
          <td><?= $nmkonde['nama'] ?></td>
          <td>
            <?php 
              if($tempviewjadwal['id_stok'] > 0){
                echo $tipe_karcis[$tempviewjadwal['id_stok']]; 
              }
               ?>
           
          </td>
          <td>
            <?php 
              echo $tempviewjadwal['pergi_awal']; 
              
            ?>
          </td>
          <td>
            <?php 
              echo $tempviewjadwal['pergi_akhir']; 
              
            ?>
          </td>
          <td>
            <?php 
              echo $tempviewjadwal['pulang_awal']; 
             
            ?>            
          </td>
          <td>
          <?php
              echo $tempviewjadwal['pulang_akhir']; 
            ?>
          </td>
          <td>
            <a href="update?id=<?php echo ($tempviewjadwal['id_setoran'].'&'.'idkarcis='.$tempviewjadwal['id_karcis']) ?>" class="btn btn-success">Setor</a>
          </td>
          
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