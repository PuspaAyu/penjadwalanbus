<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FrontendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setor-index">


    <!-- DataTables CSS -->
<head>
    <link href="http://localhost/puspa/penjadwalanbus/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="http://localhost/puspa/penjadwalanbus/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
</head>

<script src="http://localhost/puspa/penjadwalanbus/vendor/datatables/js/jquery.js"></script>
<div class="bus-index">
<!-- 
    <h4><?= Html::encode($this->title) ?></h4> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--     <p>
        <?= Html::a('Create Setoran', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>
     -->


     <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Setoran
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body responsive">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="tabel_setor">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id jadwal</th>
                                        <th>Pendapatan Kotor</th>
                                        <th>Bersih Perjalanan</th>
                                        <th>Total Bersih</th>
                                        <th>Premi Sopir</th>
                                        <th>Premi Kondektur</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n=0; foreach ($query as $item): $n++;?>
                                    <tr>
                                        <td><?= $n; ?></td>
                                        <td><?= $item['id_jadwal']; ?></td>
                                        <td><?= $item['pendapatan_kotor']; ?></td>
                                        <td><?= $item['bersih_perjalanan']; ?></td>
                                        <td><?= $item['total_bersih']; ?></td>
                                        <td><?= $item['premi_sopir']; ?></td>
                                        <td><?= $item['premi_kondektur']; ?></td>
                                        <td>
                                            <!-- <?= Html::a('<i class="fa fa-eye"></i>', ['view', 'id'=>$item['id_setor']]) ?> -->
                                            <?= Html::a('Lihat',['view', 'id'=>$item['id_setor']], ['class' => 'btn btn-success btn-xs']) ?>
                                            <?= Html::a('Setoran',['update', 'id'=>$item['id_setor']], ['class' => 'btn btn-warning btn-xs']) ?>
                                            <!-- <?= Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id'=>$item['id_setor']], ['data-method' => 'post']) ?> -->
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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