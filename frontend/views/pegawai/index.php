<?php

use yii\helpers\Html;
use yii\grid\GridView;



/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pegawai';

?>

<div class="pegawai-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pegawai', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>
<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_pegawai',
            'nama',
            'no_induk',
            'alamat',
            'no_tlp',
            //'id_jabatan',
            [
                'label' => 'Jabatan',
                'value' => function($model){
                    return $model->getJabatan();
                }
            ],
            
            'tgl_masuk',
            'kota',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
