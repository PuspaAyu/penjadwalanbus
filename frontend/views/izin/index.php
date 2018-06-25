<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\IzinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Izin';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Izin', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>

<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label'=>'Nama Pegawai',
                'value'=>function($model){
                    return $model->getPegawai();
                }
            ],
            'tgl_izin',
            'jenis_izin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
