<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\models\Jadwalbus;
use yii\models\Bus;
use yii\models\Pegawai;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\JadwalbusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwalbuses';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="jadwalbus-index2">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jadwalbus', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Generate', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    
    <div class="panel panel-primary">
        <div class="panel-heading">
          <input class="form-control" type="text" value="<?= date('Y-m-d');?>" />
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
                    <td><?= $jadwal['tanggal'] ?></td>
                    <td><?= Html::a('Lihat',['show', 'tanggal'=>$jadwal['tanggal']], ['class' => 'btn btn-success']) ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
        </div>

    </div>
   
</div>
