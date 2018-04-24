<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pegawais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pegawai',
            'nama',
            'no_induk',
            'alamat',
            'no_tlp',
            // 'jabatan',
            // 'riwayat_pendidikan',
            // 'riwayat_pekerjaan',
            // 'tgl_masuk',
            // 'jenis_kelamin',
            // 'status',
            // 'agama',
            // 'kota',
            // 'ktp_habis',
            // 'sim_habis',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
