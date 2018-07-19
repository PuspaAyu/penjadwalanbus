<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Izin;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use frontend\models\Pegawai;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\IzinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Izin';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-index">

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
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Create Izin</button>
    </p>

    <div class="container">
      
       <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content" >
           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Masukkan Tanggal Izin</h4>
            </div>

           <div class="modal-body" style="height: 280px;">
              <div class="col-lg-7">
                <form method="post" action="<?= Url::to(['izin/create']); ?>">
                  <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                  <?= Html::csrfMetaTags() ?>
                   <?php echo '<label class="control-label">Tanggal</label>';
                          echo DatePicker::widget([
                            'type' => DatePicker::TYPE_RANGE,
                            'name' => 'tgl_izin',
                            'value' => '01-Jul-2018',
                            'name2' => 'tgl_izin2',
                            'value2' => '18-Jul-2018',
                            'separator' => '<i class="glyphicon glyphicon-resize-horizontal"></i>',
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-M-yyyy'
                            ]
                        ]);
                  ?>
                <br>

                <div class="form-group">
                    <label>Pilih Nama Pegawai</label>
                    <select class="form-control" name="id_pegawai">
                        <option></option>
                        <?php foreach ($pegawai as $item):?>
                        <option value="<?= $item['id_pegawai'] ?>"><?= $item['nama']; ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="form-group">
                    <label>Alasan Izin</label>
                    <input class="form-control" placeholder="Enter text" name="jenis_izin">
                </div>    
                
                <div class="form-group">
                  <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-sm']) ?>
                </div>
   
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    


     <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DATA Izin
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body responsive">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_izin">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pegawai</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Izin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n=0; foreach ($query as $item): $n++;?>
                                    <tr>
                                        <td><?= $n; ?></td>
                                        <td><?= $item['nama']; ?></td>
                                        <td><?= date("d-F-Y", strtotime($item['tgl_izin'])); ?></td>
                                        <td><?= $item['jenis_izin']; ?></td>
                                        <td>
                                            <?= Html::a('<i class="fa fa-eye"></i>', ['view', 'id'=>$item['id_izin']]) ?>
                                            <?= Html::a('<i class="fa fa-pencil"></i>', ['update', 'id'=>$item['id_izin']]) ?>
                                            <?= Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id'=>$item['id_izin']], ['data-method' => 'post']) ?>
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
    $('#tabel_izin').DataTable();
});
// Code that uses other library's $ can follow here.
</script>
