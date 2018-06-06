<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bon-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bon', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_bon',
            'id_pegawai',
            'tgl',
            'nominal',
            'tipe',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
