<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FrontendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Setor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_setor',
            'id_jadwal',
            'solar_pergi',
            'nom_solar_pergi',
            'solar_plg',
            //'nom_solar_plg',
            //'um_sopir',
            //'um_kond',
            //'cuci_bis',
            //'tpr',
            //'tol',
            //'siaran',
            //'lain_lain',
            //'potong_minum',
            //'pendapatan_kotor',
            //'bersih_perjalanan',
            //'total_bersih',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
