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
        <th>No</th>
        <th>Jam</th>
        <th>No Polisi</th>
        <th>Jurusan</th>
        <th>Sopir</th>
        <th>Kondektur</th>
        <th>Aksi</th>
      </tr>


      <?php $i=0; foreach ($tempviewjadwal as $tempviewjadwal):?>  
        <?php $nmsopir = Pegawai::find()->where(['id_pegawai'=>$tempviewjadwal['id_sopir']])->one();?>
        <?php $nmkonde = Pegawai::find()->where(['id_pegawai'=>$tempviewjadwal['id_kondektur']])->one();?>
        <?php $jur = Jurusan::find()->where(['id_jurusan'=>$tempviewjadwal['id_jurusan']])->one(); ?>
        <tr>
          <?php $form = ActiveForm::begin(); ?>

          <input type="hidden" name="id_setoran" value="<?=  $tempviewjadwal['id_setoran'];  ?>" />
          <td><?= $i+1 ?></td>
          <td><?= $tempviewjadwal['jam'] ?></td>
          <td><?= $tempviewjadwal['id_bus'] ?></td>
          <td><?= $jur['jurusan'] ?></td>
          <td><?= $nmsopir['nama'] ?></td>
          <td><?= $nmkonde['nama'] ?></td>
          <td>
            <?= Html::a('Lihat',['index'], ['class' => 'btn btn-success']) ?>
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