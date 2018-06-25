<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\KomplainSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Komplain';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="komplain-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Komplain', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_komplain',
            'id_jadwal',
            'isi_komplain',
            'tgl_komplain',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
