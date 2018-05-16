<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\Jadwalbus;
use yii\models\Bus;
use yii\helpers\Url;
use frontend\models\Pegawai;
use frontend\models\Jurusan;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JadwalbusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwalbuses';
// print_r($tempviewjadwal);
?>

<div class="row">
  <div class="col-sm-6">
    <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>Jam</th>
        <th>No Polisi</th>
        <th>Jurusan</th>
        <th>Sopir</th>
        <th>Kondektur</th>
      </tr>

      <?php for($i=0; $i < count($tempviewjadwal)/2 ; $i++) { ?>
        <?php $nmsopir = Pegawai::find()->where(['id_pegawai'=>$tempviewjadwal[$i]['id_sopir']])->one();?>
        <?php $nmkonde = Pegawai::find()->where(['id_pegawai'=>$tempviewjadwal[$i]['id_kondektur']])->one();?>
        <?php $jur = Jurusan::find()->where(['id_jurusan'=>$tempviewjadwal[$i]['id_jurusan']])->one(); ?>
        <tr>
          <td><?= $i+1 ?></td>
          <td><?= $tempviewjadwal[$i]['jam'] ?></td>
          <td><?= $tempviewjadwal[$i]['id_bus'] ?></td>
          <td><?= $jur['jurusan'] ?></td>
          <td><?= $nmsopir['nama'] ?></td>
          <td><?= $nmkonde['nama'] ?></td>
        </tr>
      <?php } ?>
    
    </table>
    
  </div>
  <div class="col-sm-6">
    <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>Jam</th>
        <th>No Polisi</th>
        <th>Jurusan</th>
        <th>Sopir</th>
        <th>Kondektur</th>
      </tr>
      <?php for($i=count($tempviewjadwal)/2; $i < count($tempviewjadwal) ; $i++) { ?>
        <?php $nmsopir = Pegawai::find()->where(['id_pegawai'=>$tempviewjadwal[$i]['id_sopir']])->one();?>
        <?php $nmkonde = Pegawai::find()->where(['id_pegawai'=>$tempviewjadwal[$i]['id_kondektur']])->one();?>
        <?php $jur = Jurusan::find()->where(['id_jurusan'=>$tempviewjadwal[$i]['id_jurusan']])->one(); ?>
        <tr>
          <td><?= $i+1 ?></td>
          <td><?= $tempviewjadwal[$i]['jam'] ?></td>
          <td><?= $tempviewjadwal[$i]['id_bus'] ?></td>
          <td><?= $jur['jurusan'] ?></td>
          <td><?= $nmsopir['nama'] ?></td>
          <td><?= $nmkonde['nama'] ?></td>
        </tr>
      <?php } ?>

    </table>
  </div>
</div>