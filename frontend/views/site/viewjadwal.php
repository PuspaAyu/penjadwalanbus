<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\Jadwalbus;
use yii\models\Bus;
use yii\helpers\Url;
use frontend\models\Pegawai;
use frontend\models\Jurusan;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FrontendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwalbus';

?>
<br>
<div class="Jadwalbus-index">

    <?= Html::a('<i class="fa fa-arrow-left fa-fw" style="font-size:25px;"></i> Home', ['site/index']); ?>

    <!-- DataTables CSS -->
<head>
    <link href="http://localhost/puspa/penjadwalanbus/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="http://localhost/puspa/penjadwalanbus/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
</head>

<script src="http://localhost/puspa/penjadwalanbus/vendor/datatables/js/jquery.js"></script>
<div class="karcis-index">

  <br>  
  
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                JADWAL BUS 
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body responsive">
            <div class="table-responsive">
                <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="tabel_setor">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>No Polisi</th>
                            <th>Jurusan</th>
                            <th>Sopir</th>
                            <th>Kondektur</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0; $i < count($tempviewjadwal) ; $i++) { ?>
                        <?php $nmsopir = Pegawai::find()->where(['id_pegawai'=>$tempviewjadwal[$i]['id_sopir']])->one();?>
                        <?php $nmkonde = Pegawai::find()->where(['id_pegawai'=>$tempviewjadwal[$i]['id_kondektur']])->one();?>
                        <?php $jur = Jurusan::find()->where(['id_jurusan'=>$tempviewjadwal[$i]['id_jurusan']])->one(); ?>
                        <tr>
                          <td><?= $i+1 ?></td>
                          <td><?= $tempviewjadwal[$i]['tanggal'] ?></td>
                          <td><?= $tempviewjadwal[$i]['jam'] ?></td>
                          <td><?= $tempviewjadwal[$i]['id_bus'] ?></td>
                          <td><?= $jur['jurusan'] ?></td>
                          <td><?= $nmsopir['nama'] ?></td>
                          <td><?= $nmkonde['nama'] ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        </div>
    </div>
  </div>


    <!-- DataTables JavaScript -->
    <!-- <script src="http://localhost/puspa/penjadwalanbus/vendor/jquery/jquery.min.js"></script> -->
    
    <script src="http://localhost/puspa/penjadwalanbus/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/puspa/penjadwalanbus/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="http://localhost/puspa/penjadwalanbus/vendor/datatables-responsive/dataTables.responsive.js"></script>
    <!-- <script src="http://localhost/puspa/penjadwalanbus/vendor/bootstrap/js/bootstrap.min.js"></script> -->
    <!-- <script src="http://localhost/puspa/penjadwalanbus/dist/js/sb-admin-2.js"></script> -->


<!-- <script>
    $(document).ready(function() {
      $('#actionTable').DataTable({
        responsive: true
      });
    });
</script> -->

<script>
//$.noConflict();
jQuery( document ).ready(function( $ ) {
    $('#tabel_setor').DataTable();
});
// Code that uses other library's $ can follow here.
</script>

   <!--  <script>
    $(document).ready(function() {
        $('#tabel_bus').DataTable({
            responsive: true
        });
    });
    </script> -->