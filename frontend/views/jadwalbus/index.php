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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'No Polisi',
            'value'=>'bus.no_polisi',
            ],

            ['attribute'=>'Nama Pegawai',
            'value'=>'pegawai.nama',
            ],

            // 'id_jadwal',
            // 'tanggal',
            // 'jam_berangkat',
            // 'id_bus',
            // //'id_pegawai',
            // //'jam_datang',
            // //'id_jurusan',
            // 'id_sopir',
            // 'id_kondektur',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  
</div>
