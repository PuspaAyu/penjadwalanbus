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


<div class="jadwalbus-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jadwalbus', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>Tanggal : </h4>
            
        </div>
        <div class = "panel-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Jam Operasional</th>
                  <th>No Polisi</th>
                  <th>Sopir</th>
                  <th>Kondektur</th>
                  <th>Jurusan</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($jadwal as $item): ?>
                  <tr>
                    <td><?= $item['jam_operasional']; ?></td>
                    <td><?= $item['no_polisi']; ?></td>
                    <td><?= $item['sopir']; ?></td>
                    <td><?= $item['kondektur']; ?></td>
                    <td><?= $item['jurusan']; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
        </div>

    </div>
   
</div>
