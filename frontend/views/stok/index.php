<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StokSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stok';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="stok-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Stok', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_stok',
            'tipe_karcis',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
