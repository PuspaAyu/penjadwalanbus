<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\Jadwalbus;
use yii\models\Bus;
use yii\models\Pegawai;
use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JadwalbusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Jadwal Bus';
//$this->params['breadcrumbs'][] = $this->title;

?>
<head>
    <link href="http://localhost/puspa/penjadwalanbus/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="http://localhost/puspa/penjadwalanbus/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
</head>

<script src="http://localhost/puspa/penjadwalanbus/vendor/datatables/js/jquery.js"></script>

<!--  <div class="row">
  <div class="col-lg-12">
    <div class="col-lg-6 col-md-6">
      <select class="form-control" name="id_pegawai">
        <option></option>
        <option></option>
      </select>
    </div>

    <div class="col-lg-6 col-md-6">
      <button onclick="myFunction()">Click me</button>
      <p id="demo"></p>
    </div>

    
  </div>
</div> -->

<div class="row jadwalbus-show">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="panel panel-primary responsive">
        <div class="panel-heading">
          List Jadwal
        </div>
        <div class = "panel-body responsive">
          <div class="table-responsive">
            <table width="100%" class="table table-striped table-bordered table-hover" id="tabel_bus">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Jam Operasional</th>
                  <th>No Polisi</th>
                  <th>Status</th>
                  <th>Jurusan</th>
                  <th>Sopir</th>
                  <th>Kondektur</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $n=0; foreach ($jadwal as $item): $n++;?>            
                  <tr>
                  <form method="post" action="<?= Url::to(['jadwalbus/save', 'id' => $item['id_jadwal']]); ?>">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                    <td><?= $n;?></td>
                    <td><?= $item['tanggal'];?></td>
                    <td>
                      <?= $item['jam_operasional']; ?> 
                      <span style="float: right;"><?= ($n > 37) ? 'malam': 'pagi'; ?></span>
                    </td>
                    <td><?= $item['no_polisi']; ?></td>
                    <td><?= $item['status']; ?></td>
                    <td><?= $item['jurusan']; ?></td>
                    <!-- <td><?= $item['sopir']; ?></td> -->
                    <td>
                      <?php if($item['id_sopir'] == 0){ ?>
                      <?= Html::dropDownList('supir', null, $supir, ['prompt'=>'-select supir-', 'class'=>'form-control']); ?>
                      <?php } else { 
                        echo $item['sopir']; 
                        echo Html::input('hidden', 'sopir', $item['id_sopir']);
                      } ?>
                    </td>
                    <!-- <td><?= $item['kondektur']; ?></td> -->
                    <td>
                      <?php if($item['id_kondektur'] == 0) { ?>
                      <?= Html::dropDownList('kondektur', null, $kondektur, ['prompt'=>'-select kondektur-', 'class'=>'form-control']); ?>
                      <?php } else { 
                        echo $item['kondektur']; 
                        echo Html::input('hidden', 'kondektur', $item['id_kondektur']);
                      } ?>
                    </td>
                    <td>
                      <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-xs']) ?>
                      <?= Html::submitButton('Edit', ['class' => 'btn btn-warning btn-xs']) ?>
                    </td>
                  </form>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

    </div>
   
</div>
    <script src="http://localhost/puspa/penjadwalanbus/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/puspa/penjadwalanbus/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="http://localhost/puspa/penjadwalanbus/vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script>
      function myFunction() {
          document.getElementById("demo").innerHTML = "Hello World";
      }
    </script>
    <script>
      //$.noConflict();
      jQuery( document ).ready(function( $ ) {
          $('#tabel_bus').DataTable();
      });
      // Code that uses other library's $ can follow here.
    </script>