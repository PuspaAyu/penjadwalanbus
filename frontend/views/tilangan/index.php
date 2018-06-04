<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TilanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tilangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tilangan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tilangan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_tilangan',
                'tanggal_tilangan',
                'denda',
                'jenis_pelanggaran',
                'tempat_kejadian',
                // 'tanggal_batas_tilang',
                // 'status',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
