
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\model\Jadwalbus;
use frontend\model\Bus;
use frontend\model\Jurusan;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bus';
//$this->params['breadcrumbs'][] = $this->title;
?>

    <!-- DataTables CSS -->
<head>
    <link href="http://localhost/puspa/penjadwalanbus/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="http://localhost/puspa/penjadwalanbus/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
</head>

<script src="http://localhost/puspa/penjadwalanbus/vendor/datatables/js/jquery.js"></script>
<div class="bus-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bus', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>
    


     <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DATA BUS
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body responsive">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_bus">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jam Operasional</th>
                                        <th>No Polisi</th>
                                        <th>Jurusan</th>
                                        <th>Shift</th>
                                        <th>Karcis</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n=0; foreach ($query as $item): $n++;?>
                                    <tr>
                                        <td><?= $n; ?></td>
                                        <td><?= $item['jam_operasional']; ?></td>
                                        <td><?= $item['no_polisi']; ?></td>
                                        <td><?= $item['jurusan']; ?></td>
                                        <td><?= ($item['status'] == 1) ? "Pagi" : "Malam"; ?></td>
                                        <td><?= $item['seri']; ?></td>
                                        <td>
                                            <?= Html::a('<i class="fa fa-eye"></i>', ['view', 'id'=>$item['id_bus']]) ?>
                                            <?= Html::a('<i class="fa fa-pencil"></i>', ['update', 'id'=>$item['id_bus']]) ?>
                                            <?= Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id'=>$item['id_bus']], ['data-method' => 'post']) ?>
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
    $('#tabel_bus').DataTable();
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
