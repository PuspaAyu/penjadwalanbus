<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\KarcisSetorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Karcis Setors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karcis-setor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Karcis Setor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_karcis',
            'pergi_awal',
            'pergi_akhir',
            'pulang_awal',
            'pulang_akhir',
            //'id_jadwal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
