<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PengeluaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengeluarans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengeluaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pengeluaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pengeluaran',
            'solar_pergi',
            'solar_pulang',
            'um_sopir',
            'um_kondektur',
            //'cuci bis',
            //'tpr',
            //'tol',
            //'siaran',
            //'parkir',
            //'lain_lain',
            //'uang_minuman',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
