<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\Bus;
use yii\models\Pegawai;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use frontend\models\Jadwalbus;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JadwalbusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwal Bus';
// $this->params['breadcrumbs'][] = $this->title;

  // print_r($countS);
  // print_r($countK);
  // echo "<br>";
  // echo "<br>";

  // foreach ($data as $item) {
  //   foreach ($item['bus'] as $key => $value) {
  //     if ($key == 'pagi') {
  //       foreach ($value as $data) {
        //   $jadwalBus = new Jadwalbus();
        //   $jadwalBus->tanggal = $data['tanggal'];    
        //   $jadwalBus->id_bus = $data['id_bus'];
        //   $jadwalBus->id_sopir = $data['id_sopir'];
        //   $jadwalBus->id_kondektur = $data['id_kondektur'];
        //   $jadwalBus->save();
      //     print_r($data);
      //     echo "<br>";
      //   }
      //   echo "<br>";
      // }
      // else{
      //   foreach ($value as $data) {
          // $jadwalBus = new Jadwalbus();
          // $jadwalBus->tanggal = $data['tanggal'];    
          // $jadwalBus->id_bus = $data['id_bus'];
          // $jadwalBus->id_sopir = $data['id_sopir'];
          // $jadwalBus->id_kondektur = $data['id_kondektur'];
          // $jadwalBus->save();
  //         print_r($data);
  //         echo "<br>";
  //       }
  //       echo "<br>";
  //     }
  //     echo "<br>";
  //   }
  //   echo "<br>";
  // }
  // die();


?>


<div class="jadwalbus-index2">
    <h4><?= Html::encode($this->title) ?></h4>
    <?php  //echo $jadwal//$this->render('_search', ['model' => $searchModel]); ?>


    <p>
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Create Jadwal Bus</button>
    </p>

    <div class="container">
      
       <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content" >
           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Masukkan Tanggal Jadwal Bus</h4>
            </div>

           <div class="modal-body" style="height: 150px;">
              <div class="col-lg-7">
                <form method="post" action="<?= Url::to(['jadwalbus/create']); ?>">
                  <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                  <?= Html::csrfMetaTags() ?>
                   <?php echo '<label class="control-label">Tanggal</label>';
                          echo DatePicker::widget([
                            'type' => DatePicker::TYPE_RANGE,
                            'name' => 'tanggal',
                            'value' => '01-Jul-2018',
                            'name2' => 'tanggal2',
                            'value2' => '18-Jul-2018',
                            'separator' => '<i class="glyphicon glyphicon-resize-horizontal"></i>',
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-M-yyyy'
                            ]                        ]);
                        // echo DatePicker::widget([
                        //   'model' => $model,
                        //   'name' => 'tanggal',                     
                        //   'type' => DatePicker::TYPE_RANGE,
                        //   'value' => date("Y-m-d"),
                        //   'name2' => 'tanggal',
                        //   'value' => date("Y-m-d"),
                        //   'pluginOptions' => [
                        //     'autoclose'=>true,
                        //     'format' => 'yyyy-mm-dd'
                        //   ]
                        // ]); 
                  ?>
                <br>
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

    
    <div class="panel panel-primary responsive">
        <div class="panel-heading">
          <h4>List Jadwal</h4>  
        </div>
        <div class = "panel-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <!-- <th>Id Jadwal</th> -->
                  <th>Tanggal Berangkat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $n=0; foreach ($query as $jadwal): $n++?>
                  <tr>
                    <td><?= $n; ?></td>
                    <!-- <td><?= $jadwal['id_jadwal'] ?></td> -->
                    <td><?= date("d-F-Y", strtotime($jadwal['tanggal'])); ?></td>
                    <td>
                      <?= Html::a('Lihat',['show', 'tanggal'=>$jadwal['tanggal']], ['class' => 'btn btn-primary btn-sm']) ?>
                      <!-- <?= Html::a('Salin jadwal',['salinjadwal', 'id'=>$jadwal['tanggal']], ['class' => 'btn btn-warning btn-sm']) ?> -->
                      <?= Html::a('Hapus',['hapusjadwal', 'id'=>$jadwal['tanggal']], ['class' => 'btn btn-danger btn-sm']) ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
        </div>

    </div>
   
</div>
