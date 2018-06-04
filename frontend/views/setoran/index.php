<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SetoranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setorans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setoran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Setoran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_setoran',
            'id_jadwal',
            'id_karcis',
            'id_bon',
            'id_tpr',
            'id_pengeluaran',
            'pendapatan_kotor',
            'bersih_perjalanan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

